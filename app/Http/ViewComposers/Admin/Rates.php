<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\Rate;

class Rates
{
    static $composed;

    public function __construct(Rate $rate)
    {
        $this->rate = $rate;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('rates', static::$composed);
        }

        static::$composed = $this->rate->where('active', 1)->orderBy('name', 'asc')->get();

        $view->with('rates', static::$composed);

    }
}