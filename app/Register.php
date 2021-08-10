<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
     protected $fillable=['registerdate', 'photo', 'birthday', 'phone', 'address', 'status','user_id'];

     public function courses()
  {
      return $this->belongsToMany('App\Course','enroll')
      				->withTimestamps();
  }

  public function user($value='')
  {
  		return $this->belongsTo('App\User');
  }

}
