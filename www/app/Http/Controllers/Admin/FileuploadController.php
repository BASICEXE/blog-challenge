<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FileuploadController extends Controller
{
  public function upload(Request $request) {
    // sessionからTokenを取得
    $token = session('file_upload_token');
    // 基本のResponseを作成
    $data = collect([
      'uploaded' => false,
    ]);
    if(empty($token)) {
      $data = $data->merge(['error' => [
        'message' => 'error no token'
      ]]);
    } else {

      //バリデーションされているファイルは (jpeg, png, bmp, gif, or svg)
      //3Mb以下のファイル
      $validation = \Validator::make($request->all(), ['upload' => 'image|max:30000']);

      // バリデーションチェックを行う
      if (!$validation->fails()) {
        $fileName = $request->file('upload')->getClientOriginalName();
        $savePath = 'public/'.Auth::id();
        $path = $request->file('upload')->storeAs($savePath, $fileName, ['public']);
        $data = $data->merge(['uploaded'=> true, 'url' => \Storage::url($path)]);
      }
    }

    // 配列で返すとHeader付きjsonになる
    return $data->toArray();
  }
}
