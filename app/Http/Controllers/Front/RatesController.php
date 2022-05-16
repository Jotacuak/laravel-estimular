<?php

namespace App\Http\Controllers\Front;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DB\Rates;

class RatesController extends Controller
{
    protected $rate;

    function __construct(Rates $rate)
    {
        $this->rate = $rate;
    }

    public function index()
    {
        $view = View::make('front.pages.rate.index')
        ->with('rates', $this->rate->where('visible', 1)->get());
            
        return $view;
    }
}