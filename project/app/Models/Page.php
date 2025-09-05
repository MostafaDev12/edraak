<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model {

    protected $fillable = array('name','name_ar','status','program_id');
    public $timestamps = false;

    public function program()
    {
        return $this->belongsTo('App\Models\Program');
    }
    

}
