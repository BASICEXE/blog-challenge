<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
  protected $fillable = [
    'slug',
    'name',
    'description',
  ];

  public function post() {
    return $this->hasMany('App\Models\posts');
  }
}
