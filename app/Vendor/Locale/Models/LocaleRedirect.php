<?php 

namespace App\Vendor\Locale\Models;

use Illuminate\Database\Eloquent\Model;

class LocaleRedirect extends Model{

    protected $table = 'locale_redirect';
    protected $guarded = [];

    public function current_url()
    {
        return $this->belongsTo(LocaleSeo::class, 'locale_seo_id');
    }

}
