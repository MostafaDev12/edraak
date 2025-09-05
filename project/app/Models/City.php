<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model {
    protected $table = 'cities';
    protected $fillable = array('name','name_ar','status','country_id','photo');
    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
    
    public function upload($name,$file,$oldname)
    {
                $file->move('assets/images/gallery/',$name);
                if($oldname != null)
                {
                    if (file_exists(public_path().'/assets/images/gallery/'.$oldname)) {
                        unlink(public_path().'/assets/images/gallery/'.$oldname);
                    }
                }
    }
}
