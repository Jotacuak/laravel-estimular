<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Models\DB\Therapy;

class Therapies
{
    static $composed;

    public function __construct(Therapy $therapy)
    {
        $this->therapy = $therapy;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('therapies', static::$composed);
        }

        static::$composed = $this->therapy->where('active', 1)->orderBy('name', 'asc')->get();

        $view->with('therapies', static::$composed);

    }
}