<?php

namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;
use App\Models\DB\PostCategory;

class PostCategories
{
    static $composed;

    public function __construct(PostCategory $post_category)
    {
        $this->post_category = $post_category;
    }

    public function compose(View $view)
    {

        if(static::$composed)
        {
            return $view->with('posts_categories', static::$composed);
        }

        static::$composed = $this->post_category->where('active', 1)->orderBy('name', 'asc')->get();

        $view->with('posts_categories', static::$composed);

    }
}