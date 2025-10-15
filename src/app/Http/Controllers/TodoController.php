<?php

namespace App\Http\Controllers;

use App\Models\Todo;
// 記述忘れ多いので注意

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
   public function store(Request $request)
     {
         $todo = $request->only(['content']);
         Todo::create($todo);

         return redirect('/');
     }
}