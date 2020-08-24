<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class media extends Model
{

  /**
   * モデルと関連しているテーブル
   *
   * @var string
   */
  protected $table = 'medias';

  protected $fillable = [
    'name',
    'type',
    'label',
    'path',
    'url',
  ];

  public function post() {
    return $this->belongsTo('App\Models\posts');
  }

  /**
   * url // メディアのURLを返す
   * 
   * @access public
   * @return string
   */
  public function url() {
    return Storage::url($this->path);
  }

}

