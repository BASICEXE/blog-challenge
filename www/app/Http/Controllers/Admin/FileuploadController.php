<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FileuploadController extends Controller
{
  public function upload(Request $request, ImageService $imageService) {
    // 基本のResponseを作成
    $data = collect([
      'uploaded' => false,
    ]);

    //バリデーションされているファイルは (jpeg, png, bmp, gif, or svg)
    $validation = Validator::make($request->all(), ['upload' => 'image|max:300000']);

    Log::debug('test');
    Log::debug($validation->errors());
    // バリデーションチェックを行う
    if (!$validation->fails()) {
      $file = $request->file('upload');
      Log::debug('test');
      Log::debug($file);
      $fileName = $file->getClientOriginalName();
      $media = $imageService->save($fileName, $file);
      $url = $imageService->getUrl();

      $data = $data->merge(['uploaded'=> true, 'url' => $url, 'id' => $media->id]);
    } else {
      $data = $data->merge(['uploaded'=> false, 'errors' => $validation->errors()]);
    }

    // 配列で返すとHeader付きjsonになる
    return $data->toArray();
  }
}
