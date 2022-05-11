<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\PostsCategory;

class PostsCategories
{
    static $composed;

    public function __construct(PostsCategory $posts_categories)
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