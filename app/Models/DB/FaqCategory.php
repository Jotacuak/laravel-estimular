<?php

namespace App\Models\DB;

class FaqCategory extends DBModel
{

    protected $table = 'faqs_categories';

    public function faqs()
    {
        return $this->hasMany(Faq::class, 'category_id');
    }

    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'faqs_categories')->where('language', App::getLocale());
    }

}