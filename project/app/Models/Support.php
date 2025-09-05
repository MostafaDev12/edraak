<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = ['first_name','last_name','email','country','company','program','page','job_role','phone','photo','message','city'];


    public function upload($name,$file,$oldname)
    {
        $file->move('assets/images/support/',$name);
        if($oldname != null)
        {
            if (file_exists(public_path().'/assets/images/support/'.$oldname)) {
                unlink(public_path().'/assets/images/support/'.$oldname);
            }
        }
    }
}