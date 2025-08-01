<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => ['required','string','max:1000'],
        ]);

        $comment = new Comment();
        $comment->item_id = $id;
        $comment->user_id = Auth::id();
        $comment->body = $request->input('comment');
        $comment->save();

        return redirect()->route('item.detail',['id' => $id]);

    }
}