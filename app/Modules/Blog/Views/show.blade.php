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

        <div style="margin-top: 5rem; padding-top: 3rem; border-top: 1px solid var(--border);">
            <h3 style="margin-bottom: 2.5rem; font-size: 1.5rem;">Discussion</h3>

            @auth
                <div style="margin-bottom: 3rem;">
                    @include('Comments::_form', ['post_id' => $post->id])
                </div>
            @else
                <div style="background: var(--card-bg); border: 1px solid var(--border); padding: 1.5rem; border-radius: 0.75rem; text-align: center; margin-bottom: 3rem;">
                    <p style="color: var(--text-muted); font-size: 0.875rem;">Please <a href="{{ route('login') }}" style="color: var(--primary-light); font-weight: 600; text-decoration: none;">login</a> to join the conversation.</p>
                </div>
            @endauth

            <div id="comments-root">
                @include('Comments::_list', ['comments' => $post->comments->where('parent_id', null), 'depth' => 0, 'post_id' => $post->id])
            </div>
        </div>

        <div style="margin-top: 4rem; padding-top: 2rem; border-top: 1px solid var(--border);">
            <a href="{{ route('blog.index') }}" style="color: var(--primary-light); text-decoration: none; font-weight: 600;">&larr; Back to Stories</a>
        </div>
    </article>

    <script>
        function toggleReplyForm(commentId) {
            const form = document.getElementById(`reply-form-${commentId}`);
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        }
    </script>
@endsection
