<?php

namespace App\Models\DB;

class PostCategory extends DBModel
{

    protected $table = 'posts_categories';

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id');
    }

    public function seo()
    {
        return $this->hasOne(LocaleSlugSeo::class, 'key')->where('rel_parent', 'posts_categories')->where('language', App::getLocale());
    }

}