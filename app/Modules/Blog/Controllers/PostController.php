<?php

namespace App\Modules\Blog\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the blog posts.
     */
    public function index()
    {
        $posts = Post::with(['author', 'category'])
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate(10);

        return view('Blog::index', compact('posts'));
    }

    /**
     * Display the specified blog post.
     */
    public function show($slug)
    {
        $post = Post::with(['author', 'category'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        return view('Blog::show', compact('post'));
    }
}
