<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'category_id' ,
            'content'
        ];

    public function category()
    {
        return $this->belongsTo(category::class);
        // todosテーブルに紐づくcategoryを取り出すために、モデルでbelongsTo結合を使用
        // belongsToは、外部キーで関連付けられているテーブルのレコードを取り出すメソッド
    }
}
