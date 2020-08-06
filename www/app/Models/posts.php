<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{
  protected $fillable = [
    'category_id',
    'title',
    'body',
    'description',
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

  /**
   * getSummaryAttribute // 要約を表示 タグなし description or body
   * 
   * @access public
   * @return string
   */
  public function getSummaryAttribute(){
    $result = $this->description;
    if($this->description == '') {
      $result = $this->body;
    }
    return str_limit( strip_tags($result), 150 );
  }

}

