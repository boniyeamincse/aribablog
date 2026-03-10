<form action="{{ route('comments.store') }}" method="POST" style="background: var(--card-bg); border: 1px solid var(--border); padding: 1.5rem; border-radius: 0.75rem;">
    @csrf
    <input type="hidden" name="post_id" value="{{ $post_id }}">
    @if(isset($parent_id))
        <input type="hidden" name="parent_id" value="{{ $parent_id }}">
    @endif

    <div style="margin-bottom: 1rem;">
        <textarea name="body" rows="3" placeholder="Join the discussion..." required
            style="width: 100%; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white; padding: 0.75rem; font-family: inherit; resize: vertical; box-sizing: border-box;"></textarea>
    </div>

    <div style="display: flex; justify-content: flex-end;">
        <button type="submit" style="background: var(--primary); color: white; border: none; padding: 0.6rem 1.25rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: background 0.2s;">
            Post Comment
        </button>
    </div>
</form>
