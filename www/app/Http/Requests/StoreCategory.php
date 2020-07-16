<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
      'slug' => 'required|unique:categories,slug|max:50',
      'name' => 'required|unique:categories,name|max:50',
      'description' => 'max:150',
    ];
  }

  public function attributes() {
    return [
      'slug' => 'スラッグ',
      'name' => '表示名',
      'description' => '要約',
    ];
  }
}
