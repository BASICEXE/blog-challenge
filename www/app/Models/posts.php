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

  public function tags() {
    return $this->belongsToMany(tag::class, 'post_tag', 'post_id', 'tag_id');
  }

  /**
   * getTagIds // 紐づくタグのIDを返す
   * 
   * @access public
   * @return array // ['id']
   */
  public function getTagIdsAttribute() {
    return $this->tags->pluck(['id'])->toArray();
  }

}

