<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use App\Vendor\Locale\Locale;
use App\Vendor\Image\Image;
use App\Models\DB\Slide;

class SlideController extends Controller
{

    protected $agent;
    protected $image;
    protected $locale;
    protected $paginate;
    protected $slide;

    function __construct(Locale $locale, Slide $slide, Agent $agent, Image $image)
    {
        $this->middleware('auth');
        $this->agent = $agent;
        $this->locale = $locale;
        $this->image = $image;
        $this->slide = $slide;
        $this->slide->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }

        $this->locale->setParent('slider');
        $this->image->setEntity('slider');
    }

    public function index()
    {
        $view = View::make('admin.pages.sliders.index')
        ->with('slide', $this->slide)
        ->with('sliders', $this->slide->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));
    
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
        $view = View::make('admin.pages.sliders.index')
        ->with('slide', $this->slide)
        ->with('sliders', $this->slide->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }


    public function store(Request $request)
    {           
        $slide = Slide::updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'active' => 1
        ]);

        if (request('id')){
            $message = \Lang::get('admin/sliders.sliders-update');
        }else{
            $message = \Lang::get('admin/sliders.sliders-create');
        }

        if(request('locale')){
            $locale = $this->locale->store(request('locale'), $slide->id);
        }

        if(request('images')){
            $images = $this->image->store(request('images'), $slide->id);
        }

        $view = View::make('admin.pages.sliders.index')
        ->with('sliders', $this->slide->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('slide', $slide)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Slide $slide)
    {

        $locale = $this->locale->show($slide->id);

        $view = View::make('admin.pages.sliders.index')
        ->with('locale', $locale)
        ->with('slide', $slide)
        ->with('sliders', $this->slide->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Slide $slide){

        $view = View::make('admin.pages.sliders.index')
        ->with('slide', $slide)
        ->with('sliders', $this->slide->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Slide $slide)
    {
        $this->locale->delete($slide->id);
        $this->image->delete($slide->id);
        $slide->active = 0;
        $slide->save();

        $message = \Lang::get('admin/slides.slide-delete');

        $view = View::make('admin.pages.sliders.index')
        ->with('slide', $this->slide)
        ->with('sliders', $this->slide->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }
}
