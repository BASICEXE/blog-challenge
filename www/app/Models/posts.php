<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
  protected $fillable = [
    'slug_id',
    'title',
    'body',
    'user_id',
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

}

