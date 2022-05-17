<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Rates;

class HomeController extends Controller
{

    protected $rates;

    public function __construct(Rates $rates){
        $this->rates = $rates;
    }

    public function index()
    {

        $rates = $this->rates->get();

        $view = View::make('front.pages.home.index')->with('rates', $rates);
    
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }

}