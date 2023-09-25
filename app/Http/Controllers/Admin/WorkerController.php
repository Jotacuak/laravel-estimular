<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Vendor\Image\Image;
use App\Vendor\Locale\Locale;
use App\Http\Requests\Admin\WorkerRequest;
use App\Models\DB\Worker; 
use Debugbar;

class WorkerController extends Controller
{
    protected $agent;
    protected $locale;
    protected $image;
    protected $paginate;
    protected $worker;

    function __construct(Worker $worker, Locale $locale, Agent $agent, Image $image)
    {
        $this->middleware('auth');
        $this->agent = $agent;
        $this->locale = $locale;
        $this->image = $image;
        $this->worker = $worker;
        $this->worker->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }

        $this->image->setEntity('workers');
        $this->locale->setParent('workers');
    }

    public function index()
    {
        $view = View::make('admin.pages.workers.index')
        ->with('worker', $this->worker)
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));
    
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
        $view = View::make('admin.pages.workers.index')
        ->with('worker', $this->worker)
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();

        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(WorkerRequest $request)
    {            
                
        $worker = $this->worker->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        if(request('locale')){
            $locale = $this->locale->store(request('locale'), $worker->id);
        }

        if(request('images')){
            $images = $this->image->store(request('images'), $worker->id);
        }

        if (request('id')){
            $message = \Lang::get('admin/workers.workers-update');
        }else{
            $message = \Lang::get('admin/workers.workers-create');
        }

        $view = View::make('admin.pages.workers.index')
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('worker', $this->worker)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Worker $worker)
    {
        $view = View::make('admin.pages.workers.index')
        ->with('worker', $worker)
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Worker $worker){

        $locale = $this->locale->show($worker->id);

        $view = View::make('admin.pages.workers.index')
        ->with('locale', $locale)
        ->with('worker', $worker)
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Worker $worker)
    {
        $this->image->delete($worker->id);
        $this->locale->delete($worker->id);
        $worker->active = 0;
        $worker->save();

        $message = \Lang::get('admin/workers.workers-delete');

        $view = View::make('admin.pages.workers.index')
        ->with('worker', $this->worker)
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }

    public function filter(Request $request, $filters = null){

        $filters = json_decode($request->input('filters'));
        
        $query = $this->workers->query();

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
                    return $q->where('workers.name', 'like', "%$search%");
                }   
            });
    
            $query->when($filters->created_at_from, function ($q, $created_at_from) {
    
                if($created_at_from == null){
                    return $q;
                }
                else {
                    $q->whereDate('workers.created_at', '>=', $created_at_from);
                }   
            });
    
            $query->when($filters->created_at_since, function ($q, $created_at_since) {
    
                if($created_at_since == null){
                    return $q;
                }
                else {
                    $q->whereDate('workers.created_at', '<=', $created_at_since);
                }   
            });
    
            $query->when($filters->order, function ($q, $order) use ($filters) {
    
                $q->orderBy($order, $filters->direction);
            });
        }
    
        $workers = $query->where('workers.active', 1)
                ->orderBy('workers.created_at', 'desc')
                ->paginate($this->paginate)
                ->appends(['filters' => json_encode($filters)]);   

        $view = View::make('admin.pages.workers.index')
            ->with('workers', $workers)
            ->renderSections();

        return response()->json([
            'table' => $view['table'],
        ]);
    }
}