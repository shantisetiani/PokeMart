<?php

namespace App\Http\Controllers;

use App\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function InsertComment(Request $req){
        $table = new Comment();
        $table->pokemon_id = $req->id;
        $table->datetime = Carbon::now(new \DateTimeZone('Asia/Bangkok'))->format('y-m-d h:m:s');
        $table->comment = $req->comment;
        $table->email = Auth::user()->email;
        $table->save();

        return back();
    }
}
