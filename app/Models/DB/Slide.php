<?php

namespace App\Models\DB;

use App\Vendor\Locale\Models\Locale;
use App\Vendor\Image\Models\ImageResized;
use App;

class Slide extends DBModel
{

    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'slider')->where('language', App::getLocale());
    }

    public function images_featured_mobile_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'mobile')->where('entity', 'slider');
    }

    public function images_featured_desktop_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'desktop')->where('entity', 'slider');
    }

    public function image_featured_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'desktop')->where('entity', 'slider');
    }

    public function image_featured_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'mobile')->where('entity', 'slider');
    }
}
