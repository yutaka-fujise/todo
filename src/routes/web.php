<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
// URL と controller のアクションを紐付け、特定の URL にアクセスしたら処理が行われるよう設定。use文は、よく書き忘れが起こる部分なので、忘れずに記述
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', [TodoController::class, 'index']);
// URL と controller のアクションを紐付け、特定の URL にアクセスしたら処理が行われるよう設定