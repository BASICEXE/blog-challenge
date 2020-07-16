<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
  protected $fillable = [
    'category_id',
    'title',
    'body',
    'user_id',
  ];

  public function user() {
    return $this->belongsTo('App\User');
  }

  public function category() {
    return $this->belongsTo('App\Models\category');
  }

}

