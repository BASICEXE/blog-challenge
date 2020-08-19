<?php
namespace App\Services;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageService {

  /**
   * save // 画像の保存
   * 
   * @param string $fileName 
   * @param mixed $file 
   * @access public
   * @return url
   */
  public function save($fileName, $file) {
    $savePath = 'public/'.Auth::id(). '/' .now()->format('Y-m-d');
    $path = Storage::putFileAs($savePath, $file, $fileName);
    return Storage::url($path);
  }

}

