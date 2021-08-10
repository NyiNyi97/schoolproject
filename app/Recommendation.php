<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recommendation extends Model
{
    protected $fillable=['name', 'photo', 'rating', 'description', 'status'];
}
