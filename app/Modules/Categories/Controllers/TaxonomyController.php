<?php

namespace App\Modules\Categories\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Categories\Models\Category;
use App\Modules\Categories\Models\Tag;
use App\Modules\Blog\Models\Post;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    /**
     * Display posts by category.
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        // Get category IDs (including self)
        $categoryIds = [$category->id];
        $categoryIds = array_merge($categoryIds, $category->children()->pluck('id')->toArray());

        $posts = Post::with(['author', 'category'])
            ->whereIn('category_id', $categoryIds)
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate(10);

        return view('Categories::category.show', compact('category', 'posts'));
    }

    /**
     * Display posts by tag.
     */
    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->with('posts')->firstOrFail();

        $posts = $tag->posts()
            ->with(['author', 'category'])
            ->where('status', 'published')
            ->latest('published_at')
            ->paginate(10);

        return view('Categories::tag.show', compact('tag', 'posts'));
    }
}
