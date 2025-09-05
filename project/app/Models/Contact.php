<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name','last_name','email','country','city','company','website','industry','job_role','phone','customers','message'];



}