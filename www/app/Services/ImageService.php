<?php
namespace App\Services;

use App\Models\media;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImageService {

  /**
   * save // 画像の保存
   * 
   * @param string $fileName // ファイル名拡張子あり
   * @param mixed $file // ファイル自体
   * @param string $label // ファイルのラベル altなど
   * @access public
   * @return url
   */
  public function save($fileName, $file, $label = null) {
    try {

      $savePath = 'public/'.Auth::id(). '/' .now()->format('Y-m-d');

      $path = Storage::putFileAs($savePath, $file, $fileName);
      $url = Storage::url($path);
      $type = $file->getMimeType();

      media::firstOrCreate(
        ['name' => $fileName], [
        'type' => $type,
        'label' => $label,
        'path' => $path,
        'url' => $url,
      ]);
    } catch (Exception $e) {
      Log::error('メディアサービスでエラー'.$e->getMessage());
      throw new Exception($e->getMessage());
    }
    return $url;
  }

}

