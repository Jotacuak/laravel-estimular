<?php

namespace App\Models\DB;

// use App\Vendor\Locale\Models\Locale;
// use App\Vendor\Locale\Models\LocaleSlugSeo;
use App;

class Price extends DBModel
{

    public function rates(){
        return $this->belongsTo(Rate::class);
    }

    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'prices')->where('language', App::getLocale());
    }
}