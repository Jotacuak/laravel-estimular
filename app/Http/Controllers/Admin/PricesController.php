<?php

namespace App\Http\Controllers\Admin;

// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use App\Http\Requests\Admin\PricesRequest;
use App\Models\DB\Prices;

class PricesController extends Controller
{
    protected $agent;
    protected $paginate;
    protected $price;

    function __construct(Prices $price, Agent $agent)
    {
        // $this->middleware('auth');
        $this->agent = $agent;
        $this->price = $price;
        $this->price->visible = 1;

        if ($this->agent->isMobile()) {
            $this->paginate = 10;
        }

        if ($this->agent->isDesktop()) {
            $this->paginate = 6;
        }
    }

    public function index()
    {
        $view = View::make('admin.pages.prices.index')
        ->with('price', $this->price)
        ->with('prices', $this->price->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));

    
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
        $view = View::make('admin.pages.prices.index')
        ->with('price', $this->price)
        ->with('prices', $this->price->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();


        return response()->json([
            'form' => $view['form']
        ]);
    }

    public function store(PricesRequest $request)
    {            
                
        $price = $this->price->updateOrCreate([
            'id' => request('id')],[
            'name' => request('name'),
            'type' => request('type'),
            'subtotal' => request('subtotal'),
            'sumary' => request('sumary'),
            'rates_id' => request('rates_id'),
            'active' => 1,
            'visible' => request('visible') == "true" ? 1 : 0 ,
        ]);

        if (request('id')){
            $message = \Lang::get('admin/prices.prices-update');
        }else{
            $message = \Lang::get('admin/prices.prices-create');
        }

        $view = View::make('admin.pages.prices.index')
        ->with('prices', $this->price->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->with('price', $this->price)
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message,
        ]);
    }

    public function edit(Prices $price)
    {

        $view = View::make('admin.pages.prices.index')
        ->with('price', $price)
        ->with('prices', $this->price->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate));        
        
        if(request()->ajax()) {

            $sections = $view->renderSections(); 
    
            return response()->json([
                'table' => $sections['table'],
                'form' => $sections['form'],
            ]); 
        }
                
        return $view;
    }

    public function show(Prices $price){

        $view = View::make('admin.pages.prices.index')
        ->with('price', $price)
        ->with('prices', $this->price->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
        ]);
    }

    public function destroy(Prices $price)
    {
        $price->active = 0;
        $price->save();

        $message = \Lang::get('admin/prices.prices-delete');

        $view = View::make('admin.pages.prices.index')
        ->with('price', $this->price)
        ->with('prices', $this->price->where('active', 1)->orderBy('created_at', 'desc')->paginate($this->paginate))
        ->renderSections();        

        return response()->json([
            'table' => $view['table'],
            'form' => $view['form'],
            'message' => $message
        ]);
    }

    public function filter(Request $request, $filters = null){

        $filters = json_decode($request->input('filters'));
        
        $query = $this->price->query();

        if($filters != null){
    
            $query->when($filters->search, function ($q, $search) {
    
                if($search == null){
                    return $q;
                }
                else {
                    return $q->where('prices.name', 'like', "%$search%");
                }   
            });
    
            $query->when($filters->created_at_from, function ($q, $created_at_from) {
    
                if($created_at_from == null){
                    return $q;
                }
                else {
                    $q->whereDate('prices.created_at', '>=', $created_at_from);
                }   
            });
    
            $query->when($filters->created_at_since, function ($q, $created_at_since) {
    
                if($created_at_since == null){
                    return $q;
                }
                else {
                    $q->whereDate('prices.created_at', '<=', $created_at_since);
                }   
            });
    
            $query->when($filters->order, function ($q, $order) use ($filters) {
    
                $q->orderBy($order, $filters->direction);
            });
        }
    
        $prices = $query->where('prices.active', 1)
                ->orderBy('prices.created_at', 'desc')
                ->paginate($this->paginate)
                ->appends(['filters' => json_encode($filters)]);   

        $view = View::make('admin.pages.prices.index')
            ->with('prices', $prices)
            ->renderSections();

        return response()->json([
            'table' => $view['table'],
        ]);
    }
}