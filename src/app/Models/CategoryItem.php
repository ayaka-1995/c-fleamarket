<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;//テスト用のダミーデータを作れる機能
use Illuminate\Database\Eloquent\Model;//このクラスがデータベースとつながるモデルであることを示す

class CategoryItem extends Model
{
    use HasFactory;

    protected $table = 'category_items';

    protected $primaryKey = ['item_id', 'category_id'];//主キーはitem_idとcategory_idの複合キー、noteへ

    public $incrementing = false;

    protected $fillable = [
        'item_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
}
