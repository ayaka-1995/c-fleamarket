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
        $search = $request->query('search', '');//検索欄に入力された文字を受け取る
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
        $search = $request->search_item;//フォームで入力された検索ワードを取り出す、<input name = "search_item">と対応
        $query = Item::query();//商品テーブルに対する検索準備をする
        $query = Item::scopeItem($query, $search);//検索のキーワードを使って、商品検索用の条件をまとめた処理を適用する、Itemモデルの経由

        $items = $query->get();//設定した検索条件で商品一覧を取得する
        return view('index', compact('items'));//商品一覧画面(index)を表示し、検索結果の商品一覧を渡す
    }

    public function sellView(){
        $categories = Category::all();//カテゴリテーブルから、全てのカテゴリデータを取得
        $conditions = Condition::all();//商品の状態テーブルから、すべての状態データを取得
        return view('sell', compact('categories', 'conditions'));//sell.blade.phpという出品画面に、$categories $conditionsのデータを渡して表示
    }

    public function sellCreate(ItemRequest $request){//商品出品フォームから送られてきた内容を受け取る処理（ItemRequestはバリデーション専用）

        $img = $request->file('img_url');//フォームでアップロードされた画像ファイルを取得する<input type="file" name="img_url">

        try{//画像を storage/app/public/img に保存し、保存されたファイルのパスを$img_urlに入れる
            //code..
            $img_url = Storage::disk('local')->put('public/img', $img);
        } catch (\Throwable $th) {
            throw $th;
        }
        $item = Item::create([//itemsテーブルに新しい商品データを一件登録する
            //フォームに入力された商品情報を保存
            'name' => $request->name,
            'price' => $request->price,
            'brand' => $brand->brand,
            'description'=> $request->description,
            'img_url' => $img_url,//先程保存した画像のパスをDBに保存
            'condition_id' => $request->condition_id,//商品の状態（新品・中古など）を保存
            'user_id' => Auth::id(),//現在ログインしているユーザーのIDを保存（＝誰が出品した商品か）
        ]);

        foreach ($request->categories as $category_id){//選択されたカテゴリ（複数）を一つずつ処理をする
            CategoryItem::create([//中間テーブル（category_items）に「この商品はこのカテゴリです」という関係を登録（多対多）
                'item_id' => $item_id,
                'category_id' => $category_id
            ]);

            return redirect()->route('item.detail', ['item' => $item->id]);//登録した商品の詳細ページへリダイレクト
        }
    }
}
