<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [//item::create()で保存していいカラムを指定している
        'name',
        'price',
        'brand',
        'description',
        'img_url',
        'user_id',
        'condition_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function condition()
    {
        return $this->belongsTo('App\Models\Condition');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function categoryItem()// 商品とカテゴリの中間データを取得する
    {
        return $this->hasMany('App\Models\CategoryItem');
    }

    public function categories()
    {
        $categories = $this->categoryItem->map(function ($item){
            return $item->category;
        });
        return $categories;
    }

    public function liked()//今ログインしているユーザーがこの商品にいいねしているか？true/falseを返す
    {
        return Like::where(['item_id' => $this->id, 'user_id' => Auth::id()])->exists();
    }

    public function likeCount()//この商品が何件いいねされているか？
    {
        return Like::where('item_id', $this->id)->count();
    }

    public function getComments()//この商品に紐づくコメント一覧を取得する
    {
        $comments = Comment::where('item_id', $this->id)->get();
        return $comments;
    }

    public function sold()//この商品は売り切れているか？
    {
        return SoldItem::where('item_id', $this->id)->exists();
    }

    public function mine()//この商品は自分が出品したものか？
    {
        return $this->user_id == Auth::id();
    }

    public static function scopeItem($query, $item_name){//商品名に検索ワードを含む商品だけを取得する
        return $query->where('name', 'like', '%'.$item_name.'%');
    }
}
