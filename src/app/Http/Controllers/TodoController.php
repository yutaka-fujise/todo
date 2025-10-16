<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
// 作成したフォームリクエストを TodoController に反映
use App\Models\Todo;
// 記述忘れ多い注意
use Illuminate\Http\Request;

class TodoController extends Controller
{
     public function index()
   {
    $todos = Todo::all();
    // indexアクションでは、allメソッドを使用することでtodosテーブルを全て取得し、 $todosに格納
    //  return view('index');
    return view('index', compact('todos'));
    // compact関数は、viewに変数を送信することができます
   }
//    index.blade.phpを呼び出す処理
//    public function store(Request $request)
      public function store(TodoRequest $request)
     {
         $todo = $request->only(['content']);
         Todo::create($todo);

        //  return redirect('/');
        return redirect('/')->with('message', 'Todoを作成しました');
        // リダイレクトとメッセージを送る時は、withメソッドを活用。redirectメソッドに対してwithメソッドを活用すると、セクションに値が保存されます
     }
     public function destroy(Request $request)
{
    Todo::find($request->id)->delete();
    return redirect('/')->with('message', 'Todoを削除しました');
// }削除したい Todo をフォームから送信されたidで検索し、deleteメソッドで Todoを削除します
}
}