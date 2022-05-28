<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isNull;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::take(random_int(1,10))->get();
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            "comment" => $request->text
        ]);

        if (!$comment){
            return response()->json('Failed');
        }

        return response()->json('Comment added');
    }
}
