<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Admin\WorkersRequest;
use App\Models\DB\Workers; 

class WorkersController extends Controller
{
    protected $agent;
    protected $paginate;
    protected $worker;

    function __construct(Workers $worker, Agent $agent)
    {
        // $this->middleware('auth');
        $this->agent = $agent;
        $this->worker = $worker;
        $this->worker->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }
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

    public function store(WorkersRequest $request)
    {            
                
        $worker = $this->worker->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'content' => request('content'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

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

    public function edit(Workers $worker)
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

    public function show(Workers $worker){

        $view = View::make('admin.pages.workers.index')
        ->with('worker', $worker)
        ->with('workers', $this->worker->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Workers $worker)
    {
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