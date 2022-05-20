<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\Rates;

class RatesComposers
{
    static $composed;

    public function __construct(Rates $rates)
    {
        $this->rates = $rates;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('rates', static::$composed);
        }

        static::$composed = $this->rates->where('active', 1)->orderBy('name', 'asc')->get();

        $view->with('rates', static::$composed);

    }
}