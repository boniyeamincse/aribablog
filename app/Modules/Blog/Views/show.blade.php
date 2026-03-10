@extends('Blog::layouts.blog')

@section('title', $post->title)

@section('content')
    <article>
        <div style="margin-bottom: 2rem;">
            <span class="post-category" style="font-size: 1rem;">{{ $post->category->name }}</span>
            <h1>{{ $post->title }}</h1>
            <div class="article-meta">
                <span>By {{ $post->author->name }}</span>
                <span>&bull;</span>
                <span>{{ $post->published_at->format('M d, Y') }}</span>
                <span>&bull;</span>
                <span>{{ ceil(str_word_count($post->content) / 200) }} min read</span>
            </div>
        </div>

        <div class="article-body">
            {!! nl2br(e($post->content)) !!}
        </div>

        <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--border);">
            <a href="{{ route('blog.index') }}" style="color: var(--primary-light); text-decoration: none; font-weight: 600;">&larr; Back to Stories</a>
        </div>
    </article>
@endsection
