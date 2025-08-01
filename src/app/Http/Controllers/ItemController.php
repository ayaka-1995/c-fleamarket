<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function item($id)
    {
        $item = Item::findOrFail($id);
        return view('detail',compact('item'));
    }
    public function show($id)
    {
        $item = Item::with('comments.user')->findOrFail($id);

        return view('detail',compact('item'));
    }
}
