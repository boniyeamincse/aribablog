@foreach($comments as $comment)
    <div style="margin-bottom: 1.5rem; padding-left: {{ $depth * 2 }}rem; border-left: 1px solid var(--border);">
        <div style="display: flex; align-items: center; margin-bottom: 0.5rem;">
            <div style="width: 2rem; height: 2rem; border-radius: 50%; background: var(--border); margin-right: 0.75rem;"></div>
            <div>
                <div style="font-weight: 600; font-size: 0.875rem;">{{ $comment->user->name }}</div>
                <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $comment->created_at->diffForHumans() }}</div>
            </div>
        </div>
        <div style="font-size: 0.9375rem; color: var(--text-main); line-height: 1.5;">
            {{ $comment->body }}
        </div>
        
        @auth
            <button onclick="toggleReplyForm({{ $comment->id }})" style="background:none; border:none; color: var(--primary-light); font-size: 0.75rem; cursor:pointer; padding: 0.5rem 0; font-weight: 600;">Reply</button>
            <div id="reply-form-{{ $comment->id }}" style="display:none; margin-top: 1rem;">
                @include('Comments::_form', ['post_id' => $post_id, 'parent_id' => $comment->id])
            </div>
        @endauth

        @if($comment->replies->count() > 0)
            <div style="margin-top: 1rem;">
                @include('Comments::_list', ['comments' => $comment->replies, 'depth' => $depth + 1, 'post_id' => $post_id])
            </div>
        @endif
    </div>
@endforeach
