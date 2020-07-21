<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
  protected $fillable = [
    'slug',
    'name',
    'description',
  ];

  public function getRouteKeyName() {
    return 'slug';
  }

  public function post() {
    return $this->hasMany('App\Models\posts');
  }

}

