<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = ['title','subtitle','currency','currency_code','price','days','allowed_products','details','marks','date','value'];
    public $timestamps = false;
}