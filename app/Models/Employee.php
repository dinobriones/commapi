<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $fillable = ['user_id','emp_no','first_name','middle_name','last_name','email_address','contact_no'];
    protected $table = 'employees';
    public function user()
    {
        return $this->belongsTo('App\User','user_id');      
    }
}
