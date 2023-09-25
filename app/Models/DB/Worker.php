<?php

namespace App\Models\DB;

use App\Vendor\Locale\Models\Locale;
use App\Vendor\Image\Models\ImageResized;
use App;

class Worker extends DBModel
{
    
    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'workers')->where('language', App::getLocale());
    }

    public function images_featured_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'featured')->where('entity', 'workers');
    }

    public function image_featured_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'featured')->where('entity', 'workers')->where('language', App::getLocale());
    }

    public function image_featured_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'featured')->where('entity', 'workers')->where('language', App::getLocale());
    }
}