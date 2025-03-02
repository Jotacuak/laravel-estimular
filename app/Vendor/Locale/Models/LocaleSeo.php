<?php 

namespace App\Vendor\Locale\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * Translation model
 *
 * @property integer $id
 * @property integer $status
 * @property string  $locale
 * @property string  $group
 * @property string  $key
 * @property string  $value
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class LocaleSeo extends Model{

    const STATUS_SAVED = 0;
    const STATUS_CHANGED = 1;

    protected $table = 'locale_seo';
    protected $guarded = array('id', 'created_at', 'updated_at');

    public function slugs() {
        return $this->hasMany(LocaleSlugSeo::class, 'locale_seo_id');
    }

    public function scopeOfTranslatedGroup($query, $group)
    {
        return $query->where('group', $group);
    }

    public function scopeOrderByGroupKeys($query, $ordered) {
        if ($ordered) {
            $query->orderBy('group')->orderBy('key');
        }

        return $query;
    }

    public function scopeSelectDistinctGroup($query)
    {
        $select = '';

        switch (DB::getDriverName()){
            case 'mysql':
                $select = 'DISTINCT `group`';
                break;
            default:
                $select = 'DISTINCT "group"';
                break;
        }

        return $query->select(DB::raw($select));
    }

    public function scopeGetByKey($query, $language, $key){ 
        return $query->where('language', $language)
            ->where('key', $key);
    }
}
