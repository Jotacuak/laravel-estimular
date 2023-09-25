<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Admin\TherapyRequest;
use App\Vendor\Locale\Locale;
use App\Vendor\Locale\LocaleSlugSeo;
use App\Models\DB\Therapy; 
use App\Vendor\Image\Image;

class TherapyController extends Controller
{
    protected $agent;
    protected $image;
    protected $locale;
    protected $locale_slug_seo;
    protected $paginate;
    protected $therapy;

    function __construct(Therapy $therapy, Locale $locale, LocaleSlugSeo $locale_slug_seo, Agent $agent, Image $image)
    {
        $this->middleware('auth');
        $this->agent = $agent;
        $this->image = $image;
        $this->locale = $locale;
        $this->locale_slug_seo = $locale_slug_seo;
        $this->therapy = $therapy;
        $this->therapy->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }

        $this->locale->setParent('therapy');
        $this->locale_slug_seo->setParent('therapy');
        $this->image->setEntity('therapy');
    }

    public function index()
    {
        $view = View::make('admin.pages.therapies.index')
        ->with('therapy', $this->therapy)
        ->with('therapies', $this->therapy->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));

    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }

        return $view;
    }

    public function create()
    {
        $view = View::make('admin.pages.therapies.index')
        ->with('therapy', $this->therapy)
        ->with('therapies', $this->therapy->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(TherapyRequest $request)
    {            
                
        $therapy = $this->therapy->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        if(request('seo')){
            $seo = $this->locale_slug_seo->store(request('seo'), $therapy->id, 'front_therapy');
        }

        if(request('locale')){
            $locale = $this->locale->store(request('locale'), $therapy->id);
        }

        if(request('images')){
            $images = $this->image->store(request('images'), $therapy->id);
        }

        if (request('id')){
            $message = \Lang::get('admin/therapies.therapies-update');
        }else{
            $message = \Lang::get('admin/therapies.therapies-create');
        }

        $view = View::make('admin.pages.therapies.index')
        ->with('therapies', $this->therapy->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('therapy', $therapy)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Therapy $therapy)
    {
        $locale = $this->locale->show($therapy->id);
        $seo = $this->locale_slug_seo->show($therapy->id);
        
        $view = View::make('admin.pages.therapies.index')
        ->with('locale', $locale)
        ->with('seo', $seo)
        ->with('therapy', $therapy)
        ->with('therapies', $this->therapy->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));       
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Therapy $therapy){

        $view = View::make('admin.pages.therapies.index')
        ->with('therapy', $therapy)
        ->with('therapies', $this->therapy->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Therapy $therapy)
    {
        $this->locale->delete($therapy->id);
        $this->locale_slug_seo->delete($therapy->id);
        $this->image->delete($therapy->id);

        $therapy->active = 0;
        $therapy->save();

        $message = \Lang::get('admin/therapies.therapies-delete');

        $view = View::make('admin.pages.therapies.index')
        ->with('therapy', $this->therapy)
        ->with('therapies', $this->therapy->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }

    public function filter(Request $request, $filters = null){

        $filters = json_decode($request->input('filters'));
        
        $query = $this->therapy->query();

        if($filters != null){

            $query->when($filters->category_id, function ($q, $category_id) {

                if($category_id == 'all'){
                    return $q;
                }
                else{
                    return $q->where('category_id', $category_id);
                }
            });
    
            $query->when($filters->search, function ($q, $search) {
    
                if($search == null){
                    return $q;
                }
                else {
                    return $q->where('therapies.name', 'like', "%$search%");
                }   
            });
    
            $query->when($filters->created_at_from, function ($q, $created_at_from) {
    
                if($created_at_from == null){
                    return $q;
                }
                else {
                    $q->whereDate('therapies.created_at', '>=', $created_at_from);
                }   
            });
    
            $query->when($filters->created_at_since, function ($q, $created_at_since) {
    
                if($created_at_since == null){
                    return $q;
                }
                else {
                    $q->whereDate('therapies.created_at', '<=', $created_at_since);
                }   
            });
    
            $query->when($filters->order, function ($q, $order) use ($filters) {
    
                $q->orderBy($order, $filters->direction);
            });
        }
    
        $therapies = $query->where('therapies.active', 1)
                ->orderBy('therapies.created_at', 'desc')
                ->paginate($this->paginate)
                ->appends(['filters' => json_encode($filters)]);   

        $view = View::make('admin.pages.therapies.index')
            ->with('therapies', $therapies)
            ->renderSections();

        return response()->json([
            'table' => $view['table'],
        ]);
    }
}