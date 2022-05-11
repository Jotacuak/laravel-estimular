<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Admin\TherapiesRequest;
use App\Models\DB\Therapies; 

class TherapiesController extends Controller
{
    protected $agent;
    protected $paginate;
    protected $therapies;

    function __construct(Therapies $therapies, Agent $agent)
    {
        // $this->middleware('auth');
        $this->agent = $agent;
        $this->therapies = $therapies;
        $this->therapies->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }
    }

    public function index()
    {
        $view = View::make('admin.pages.therapies.index')
        ->with('therapy', $this->therapies)
        ->with('therapies', $this->therapies->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));

    
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
        ->with('therapies', $this->therapies)
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(TherapiesRequest $request)
    {            
                
        $therapies = $this->therapies->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'description' => request('description'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
            'category_id' => request('category_id'),
        ]);

        if (request('id')){
            $message = \Lang::get('admin/therapies.therapies-update');
        }else{
            $message = \Lang::get('admin/therapies.therapies-create');
        }

        $view = View::make('admin.pages.therapies.index')
        ->with('therapies', $this->therapies->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        //  Añadir a la línea superior cuando ->paginate($this->paginate)
        ->with('therapies', $this->therapies)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Therapies $therapies)
    {
        $view = View::make('admin.pages.therapies.index')
        ->with('therapies', $therapies)
        ->with('therapies', $this->therapies->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Therapies $therapies){

        $view = View::make('admin.pages.therapies.index')
        ->with('therapies', $therapies)
        ->with('therapies', $this->therapies->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Therapies $therapies)
    {
        $therapies->active = 0;
        $therapies->save();

        $message = \Lang::get('admin/therapies.therapies-delete');

        $view = View::make('admin.pages.therapies.index')
        ->with('therapies', $this->therapies)
        ->with('therapies', $this->therapies->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }

    public function filter(Request $request, $filters = null){

        $filters = json_decode($request->input('filters'));
        
        $query = $this->therapies->query();

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