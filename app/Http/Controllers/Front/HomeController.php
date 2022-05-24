<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Prices;

class HomeController extends Controller
{

    protected $prices;

    public function __construct(Prices $prices){
        
        $this->prices = $prices;
    }

    public function index()
    {

        $prices = $this->prices->get();

        $view = View::make('front.pages.home.index')->with('prices', $prices);
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}