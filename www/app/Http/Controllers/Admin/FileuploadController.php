<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileuploadController extends Controller
{
  public function upload(Request $request, ImageService $imageService) {
    // 基本のResponseを作成
    $data = collect([
      'uploaded' => false,
    ]);

    //バリデーションされているファイルは (jpeg, png, bmp, gif, or svg)
    //3Mb以下のファイル
    $validation = \Validator::make($request->all(), ['upload' => 'image|max:30000']);

    // バリデーションチェックを行う
    if (!$validation->fails()) {
      $file = $request->file('upload');
      $fileName = $file->getClientOriginalName();
      $media = $imageService->save($fileName, $file);
      $url = $imageService->getUrl();

      $data = $data->merge(['uploaded'=> true, 'url' => $url, 'id' => $media->id]);
    }

    // 配列で返すとHeader付きjsonになる
    return $data->toArray();
  }
}
