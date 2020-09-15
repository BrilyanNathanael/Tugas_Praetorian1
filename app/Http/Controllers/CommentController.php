<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{
    public function create(Request $request, $id){
        $user = Auth::user();
        $user->commentArticle()->attach($id,['comment' => $request->comment]);
        return back();
    }

    public function reply(Request $request, $id){
        $user = Auth::user();
        $user->replyComment()->attach($id,['reply' => $request->reply]);
        return back();
    }
}
