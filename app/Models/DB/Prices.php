<?php

namespace App\Models\DB;

// use App\Vendor\Locale\Models\Locale;
// use App\Vendor\Locale\Models\LocaleSlugSeo;
use App;

class Prices extends DBModel
{

    protected $table = 'prices';   

    public function rates(){

        return $this->belongsTo(Rates::class);

    }
}