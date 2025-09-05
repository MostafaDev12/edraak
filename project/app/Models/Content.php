<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','title_ar','details','details_ar','product_id','photo'];


   public function product()
    {
        return $this->belongsTo('App\Models\Product');
    } 

}