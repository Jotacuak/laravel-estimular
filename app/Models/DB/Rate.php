<?php

namespace App\Models\DB;

// use App\Vendor\Locale\Models\Locale;
// use App\Vendor\Locale\Models\LocaleSlugSeo;
use App\Vendor\Image\Models\ImageResized;
use App;

class Rate extends DBModel
{

    // protected $with = ['category'];
    // protected $with = ['category','seo'];

    public function prices(){

        return $this->hasMany(Price::class, 'rate_id'); 
        
    }

    public function images_featured_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'featured')->where('entity', 'rates');
    }

    public function image_featured_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'featured')->where('entity', 'rates')->where('language', App::getLocale());
    }

    public function image_featured_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'featured')->where('entity', 'rates')->where('language', App::getLocale());
    }
}