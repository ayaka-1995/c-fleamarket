<?php

namespace App\Http\Controllers;

use Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use App\Models\CategoryItem;

class ItemController extends Controller
{
    public function index(Request $request){
        $tab = $request->query('tab', 'recommend');//URLに$tabがあればそれを使う。なければおすすめを表示する
        $search = $request->query('search');//検索欄に入力された文字を受け取る
        $query = Item::query();//商品を探す準備をする
        $query->where('user_id', '<>', Auth::id());//noteへ

        if ($tab === 'mylist'){//今、マイリストタブが選ばれていたら
            $query->whereIn('id', function($query){//商品のIDがこれから指定する一覧の中に当てはまる商品だけ表示する
                $query->select('item_id')//item_idだけを取り出す
                ->from('likes')//Likeのテーブルから
                ->where('user_id', auth()->id());//user_idが「今ログインしている自分」のものだけ
            });//likesのテーブルの中から、今ログインしている自分がいいねした商品のID一覧を取得する
        }

        if($search){//検索ワードが入力されていたら
            $query->where('name', 'like', "%{$search}%");//商品名に、検索ワードが含まれている商品だけを表示する
        }

        $items = $query->get();//今まで条件を積み上げてきた$queryを使ってデータベースから商品データを全部取得する

        return view('index', compact('items', 'tab', 'search'));//noteへ
    }

    public function detail(Item $item){//商品を１件受け取って、詳細画面を表示する処理
        return view('detail', compact('item'));//detailという画面を表示して、取得した商品データ$itemを画面に渡す
    }

    public function search(Request $request){//検索フォームから送られてきた情報を受け取る処理
        $search_word = $request->search_item;//フォームで入力された検索ワードを取り出す、<input name = "search_item">と対応
        $query = Item::query();//商品テーブルに対する検索準備をする
        $query = Item::scopeItem($query, $search_word);//検索のキーワードを使って、商品検索用の条件をまとめた処理を適用する、Itemモデルの経由

        $items = $query->get();//設定した検索条件で商品一覧を取得する
        return view('index', compact('items'));//商品一覧画面(index)を表示し、検索結果の商品一覧を渡す
    }
}
