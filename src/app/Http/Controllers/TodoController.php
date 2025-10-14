<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
     public function index()
   {
     return view('index');
   }
//    index.blade.phpを呼び出す処理
}
