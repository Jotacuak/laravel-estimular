<?php

namespace App\Models\DB;

// use App\Vendor\Locale\Models\Locale;
// use App\Vendor\Locale\Models\LocaleSlugSeo;
// use App\Vendor\Image\Models\ImageResized;
use App;

class Rates extends DBModel
{

    protected $table = 'rates';
    // protected $with = ['category'];
    // protected $with = ['category','seo'];

    public function prices(){

        return $this->hasMany(Price::class, 'rate_id'); 
        
    }

    // public function category()
    // {
    //     return $this->belongsTo(BlogCategory::class);
    // }

    // public function images_featured_preview()
    // {
    //     return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'featured')->where('entity', 'blog');
    // }

    // public function image_featured_desktop()
    // {
    //     return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'featured')->where('entity', 'blog')->where('language', App::getLocale());
    // }

    // public function image_featured_mobile()
    // {
    //     return $this->hasOne(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'featured')->where('entity', 'blog')->where('language', App::getLocale());
    // }

    // public function images_grid_preview()
    // {
    //     return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'preview')->where('content', 'grid')->where('entity', 'blog');
    // }

    // public function image_grid_desktop()
    // {
    //     return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'desktop')->where('content', 'grid')->where('entity', 'blog')->where('language', App::getLocale());
    // }

    // public function image_grid_mobile()
    // {
    //     return $this->hasMany(ImageResized::class, 'entity_id')->where('grid', 'mobile')->where('content', 'grid')->where('entity', 'blog')->where('language', App::getLocale());
    // }

}