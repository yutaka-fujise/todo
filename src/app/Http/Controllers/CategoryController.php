<?php

namespace App\Http\Controllers;

use App\Models\Category;
// 記述忘れ多いので注意。モデルインポート
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // モデルに対して、テーブルの値全てを取得するallメソッドを使用します。 $categoriesにCategoriesテーブルの内容全てを格納

        return view('category', compact('categories'));
        // その後、category.blade.phpを呼び出し、$categoriesを送信
    }
    // categoriesテーブルのデータをCategoryController.phpでカテゴリ一覧ページを呼び出す処理
}
