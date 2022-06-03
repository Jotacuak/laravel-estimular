<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Admin\RatesRequest;
use App\Models\DB\Rates; 

class RatesController extends Controller
{
    protected $agent;
    protected $paginate;
    protected $rate;

    function __construct(Rates $rate, Agent $agent)
    {
        // $this->middleware('auth');
        $this->agent = $agent;
        $this->rate = $rate;
        $this->rate->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }
    }

    public function index()
    {
        $view = View::make('admin.pages.rates.index')
        ->with('rate', $this->rate)
        ->with('rates', $this->rate->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));

    
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
        $view = View::make('admin.pages.rates.index')
        ->with('rate', $this->rate)
        ->with('rates', $this->rate->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();


        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(RatesRequest $request)
    {            
                
        $rate = $this->rate->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'title' => request('title'),
            'content' => request('content'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        if (request('id')){
            $message = \Lang::get('admin/rates.rates-update');
        }else{
            $message = \Lang::get('admin/rates.rates-create');
        }

        $view = View::make('admin.pages.rates.index')
        ->with('rates', $this->rate->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('rate', $this->rate)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Rates $rate)
    {
        $view = View::make('admin.pages.rates.index')
        ->with('rate', $rate)
        ->with('rates', $this->rate->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Rates $rate){

        $view = View::make('admin.pages.rates.index')
        ->with('rate', $rate)
        ->with('rates', $this->rate->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Rates $rate)
    {
        $rate->active = 0;
        $rate->save();

        $message = \Lang::get('admin/rates.rates-delete');

        $view = View::make('admin.pages.rates.index')
        ->with('rate', $this->rate)
        ->with('rates', $this->rate->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }

    public function filter(Request $request, $filters = null){

        $filters = json_decode($request->input('filters'));
        
        $query = $this->rate->query();

        if($filters != null){
    
            $query->when($filters->search, function ($q, $search) {
    
                if($search == null){
                    return $q;
                }
                else {
                    return $q->where('rates.name', 'like', "%$search%");
                }   
            });
    
            $query->when($filters->created_at_from, function ($q, $created_at_from) {
    
                if($created_at_from == null){
                    return $q;
                }
                else {
                    $q->whereDate('rates.created_at', '>=', $created_at_from);
                }   
            });
    
            $query->when($filters->created_at_since, function ($q, $created_at_since) {
    
                if($created_at_since == null){
                    return $q;
                }
                else {
                    $q->whereDate('rates.created_at', '<=', $created_at_since);
                }   
            });
    
            $query->when($filters->order, function ($q, $order) use ($filters) {
    
                $q->orderBy($order, $filters->direction);
            });
        }
    
        $rates = $query->where('rates.active', 1)
                ->orderBy('rates.created_at', 'desc')
                ->paginate($this->paginate)
                ->appends(['filters' => json_encode($filters)]);   

        $view = View::make('admin.pages.rates.index')
            ->with('rates', $rates)
            ->renderSections();

        return response()->json([
            'table' => $view['table'],
        ]);
    }
}