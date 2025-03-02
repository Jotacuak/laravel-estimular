<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Rate;

class RateController extends Controller
{
    protected $rate;

    function __construct(Rate $rate)
    {
        $this->rate = $rate;
    }

    public function index()
    {
        $view = View::make('front.pages.rate.index')
        ->with('rates', $this->rate->where('visible', 1)->get());
            
        if(request()->ajax()) {
            
            $sections = $view->renderSections(); 
    
            return response()->json([
                'content' => $sections['content'],
            ]); 
        }

        return $view;
    }
}