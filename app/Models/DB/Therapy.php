<?php

namespace App\Models\DB;

use App\Vendor\Locale\Models\Locale;
use App\Vendor\Locale\Models\LocaleSlugSeo;
use App\Vendor\Image\Models\ImageResized;
use App;

class Therapy extends DBModel
{

    protected $table = 'therapies';

    
    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'therapy')->where('language', App::getLocale());
    }

    public function seo()
    {
        return $this->hasOne(LocaleSlugSeo::class, 'key')->where('rel_parent', 'therapy')->where('language', App::getLocale());
    }

    public function image_featured_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'featured')->where('entity', 'therapy');
    }

    public function image_featured_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'featured')->where('entity', 'therapy');
    }

    public function image_featured_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'featured')->where('entity', 'therapy');
    }

    public function image_icon_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'icon')->where('entity', 'therapy');
    }

    public function image_icon_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'icon')->where('entity', 'therapy');
    }

    public function image_icon_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'icon')->where('entity', 'therapy');
    }

   

}