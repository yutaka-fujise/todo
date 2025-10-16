<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
  public function authorize()
  {
    // return false;
    return true;
    // authorizeメソッドの部分は、Trueに変更することを忘れないようにしましょう。 忘れてしまうと 403エラー
  }

  public function rules()
  {
    return [
      'content' => ['required', 'string', 'max:20']
    ];
  }

  public function messages()
  {
    return [
      'content.required' => 'Todoを入力してください',
      'content.string' => 'Todoを文字列で入力してください',
      'content.max' => 'Todoを20文字以下で入力してください',
    ];
  }
}