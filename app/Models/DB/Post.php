<?php

namespace App\Models\DB;

use App\Vendor\Locale\Models\Locale;
use App\Vendor\Locale\Models\LocaleSlugSeo;
use App\Vendor\Image\Models\ImageResized;
use Illuminate\Support\Facades\Log;

use App;

class Post extends DBModel
{

    protected $with = ['category','seo'];

    public function category()
    {
        return $this->belongsTo(PostCategory::class);
    }

    public function locale()
    {
        return $this->hasMany(Locale::class, 'key')->where('rel_parent', 'posts')->where('language', App::getLocale());
    }

    public function seo()
    {
        return $this->hasOne(LocaleSlugSeo::class, 'key')->where('rel_parent', 'posts')->where('language', App::getLocale());
    }

    public function images_featured_preview()
    {
        return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'featured')->where('entity', 'posts');
    }

    public function image_featured_desktop()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'featured')->where('entity', 'posts')->where('language', App::getLocale());
    }

    public function image_featured_mobile()
    {
        return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'featured')->where('entity', 'posts')->where('language', App::getLocale());
    }

}