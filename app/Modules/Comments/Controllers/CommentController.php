<?php

namespace App\Modules\Comments\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Comments\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Store a newly created comment in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => ['required', 'exists:posts,id'],
            'parent_id' => ['nullable', 'exists:comments,id'],
            'body' => ['required', 'string', 'max:1000'],
        ]);

        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id,
            'body' => $request->body,
            'is_approved' => true,
        ]);

        return back()->with('success', 'Comment posted successfully!');
    }
}
