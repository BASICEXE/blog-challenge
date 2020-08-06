<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePost extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'title'       => 'required',
      'category_id' => 'numeric',
      'body'        => 'present',
      'discretion'  => 'max:250',
    ];
  }

  public function attributes()
  {
    return [
      'title' => 'タイトル',
      'category_id' => 'カテゴリー',
      'body' => '記事内容',
    ];
  }
}
