<?php

namespace App\Http\ViewComposers\Front;

use Illuminate\View\View;
use App\Models\DB\PostCategory;

class PostCategories
{
    static $composed;

    public function __construct(PostCategory $posts_categories)
    {
        $this->posts_categories = $posts_categories;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('posts_categories', static::$composed);
        }

        static::$composed = $this->posts_categories->where('active', 1)->orderBy('name', 'asc')->get();

        $view->with('posts_categories', static::$composed);

    }
}