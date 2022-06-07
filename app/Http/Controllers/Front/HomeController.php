<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Prices;
// use App\Models\DB\Therapies;

class HomeController extends Controller
{

    protected $prices;
    // protected $therapies;

    public function __construct(Prices $prices){
        
        $this->prices = $prices;
        // $this->therapies = $therapies;
    }

    public function index()
    {

        $prices = $this->prices->get();
        // $therapies = $this->therapies->get();

        $view = View::make('front.pages.home.index')
                    ->with('prices', $prices);
                    // ->with('therapies', $therapies);
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}