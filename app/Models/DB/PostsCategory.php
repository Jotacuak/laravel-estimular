<?php

namespace App\Models\DB;

class PostsCategory extends DBModel
{

    protected $table = 'posts_categories';

    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }

}