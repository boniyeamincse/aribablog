@extends('Blog::layouts.blog')

@section('title', 'Category: ' . $category->name)

@section('content')
    <div style="margin-bottom: 4rem;">
        <span class="post-category" style="font-size: 0.875rem;">Browsing Category</span>
        <h2 style="font-size: 2.5rem; margin-bottom: 0.5rem;">{{ $category->name }}</h2>
        @if($category->parent)
            <p style="color: var(--text-muted);">Subcategory of <a href="{{ route('category.show', $category->parent->slug) }}" style="color: var(--primary-light); text-decoration: none;">{{ $category->parent->name }}</a></p>
        @endif
    </div>

    @if($posts->count() > 0)
        <div class="blog-grid">
            @foreach($posts as $post)
                <a href="{{ route('blog.show', $post->slug) }}" class="post-card">
                    <div class="post-content">
                        <span class="post-category">{{ $post->category->name }}</span>
                        <h3 class="post-title">{{ $post->title }}</h3>
                        <p class="post-excerpt">{{ $post->excerpt }}</p>
                        <div class="post-meta">
                            <span>By {{ $post->author->name }}</span>
                            <span style="margin: 0 0.5rem;">&bull;</span>
                            <span>{{ $post->published_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div style="margin-top: 3rem;">
            {{ $posts->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 5rem 0; background: var(--card-bg); border-radius: 1rem; border: 1px dashed var(--border);">
            <h3 style="color: var(--text-muted); font-weight: 500;">No stories in this category yet.</h3>
        </div>
    @endif
@endsection
