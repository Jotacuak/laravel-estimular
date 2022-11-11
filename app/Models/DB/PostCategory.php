<?php

namespace App\Models\DB;

class PostCategory extends DBModel
{

    protected $table = 'posts_categories';

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

}