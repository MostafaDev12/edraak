<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Generalsetting;
use App\Models\Currency;
use App\Models\Color;

use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
   use SoftDeletes;
   
    protected $fillable = ['category_id','slug_ar', 'feature',  'id', 'attributes', 'name_ar','job_date','job_type','job_location','job_salary', 'name', 'photo', 'size','size_qty','size_price', 'color','mobile_photo', 'mobile_details_ar', 'mobile_details', 'details_ar', 'details','status', 'views','tags','tags_ar','features','colors','meta_tag','meta_tag_ar','meta_description_ar','meta_description','catalog_id','slug_ar','slug','hover_photo','alt','alt_ar','title','title_ar'];

    public static function filterProducts($collection)
    {

        return $collection;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    } 




    public function clicks()
    {
        return $this->hasMany('App\Models\ProductClick');
    }






    public static function showTags() {
        $tags = null;
        $tagz = '';
        $name = Product::where('status','=',1)->pluck('tags')->toArray();
        foreach($name as $nm)
        {
            if(!empty($nm))
            {
                foreach($nm as $n)
                {
                    $tagz .= $n.',';
                }
            }
        }
        $tags = array_unique(explode(',',$tagz));
        return $tags;
    }


    public function getSizeAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getSizeQtyAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getSizePriceAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getColorAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getTagsAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getMetaTagAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getFeaturesAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getColorsAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getLicenseAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',,', $value);
    }

    public function getLicenseQtyAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getWholeSellQtyAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    public function getWholeSellDiscountAttribute($value)
    {
        if($value == null)
        {
            return '';
        }
        return explode(',', $value);
    }

    
}
