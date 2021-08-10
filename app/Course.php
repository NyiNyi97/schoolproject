<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
      protected $fillable=['name', 'photo', 'price', 'description', 'status', 'startdate',
						'category_id'];

  public function category()
  {
      return $this->belongsTo('App\Category');
  }

  public function registers()
  {
      return $this->belongsToMany('App\Register','enroll')
                      ->withTimestamps();
  }
}
