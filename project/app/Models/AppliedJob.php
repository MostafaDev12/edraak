<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model {

    protected $fillable = array('name','career_id','career_name','email','phones','address','country','city','start_date','relocate','salary_expectation','hear_from','ex_military','resume');


    public function career()
    {
        return $this->belongsTo('App\Models\Career');
    }

    public function upload($name,$file,$oldname)
    {
        $file->move('assets/images/cv/',$name);
        if($oldname != null)
        {
            if (file_exists(public_path().'/assets/images/cv/'.$oldname)) {
                unlink(public_path().'/assets/images/cv/'.$oldname);
            }
        }
    }
}
