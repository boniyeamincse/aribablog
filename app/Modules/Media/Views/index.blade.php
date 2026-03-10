@extends('Blog::layouts.blog')

@section('title', 'Media Library')

@section('content')
    <div style="margin-bottom: 3rem; display: flex; justify-content: space-between; align-items: flex-end;">
        <div>
            <h1 style="font-size: 2rem; font-weight: 700;">Media Library</h1>
            <p style="color: var(--text-muted); font-size: 0.875rem;">Manage your blog assets and uploads.</p>
        </div>
        
        <form action="{{ route('media.upload') }}" method="POST" enctype="multipart/form-data" id="upload-form" style="display: flex; align-items: center; gap: 1rem;">
            @csrf
            <label for="file-upload" style="background: var(--card-bg); border: 1px dashed var(--border); padding: 0.6rem 1.25rem; border-radius: 0.5rem; font-size: 0.875rem; font-weight: 600; cursor: pointer; transition: border-color 0.2s;">
                <span>Select File</span>
                <input id="file-upload" name="file" type="file" style="display: none;" onchange="this.form.submit()">
            </label>
        </form>
    </div>

    @if($assets->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 1.5rem;">
            @foreach($assets as $asset)
                <div style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 0.75rem; overflow: hidden; position: relative;">
                    <div style="aspect-ratio: 1; overflow: hidden; background: #000;">
                        <img src="{{ $asset->url }}" alt="{{ $asset->filename }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div style="padding: 0.75rem;">
                        <div style="font-size: 0.75rem; font-weight: 600; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; color: white;">{{ $asset->filename }}</div>
                        <div style="font-size: 0.65rem; color: var(--text-muted); margin-top: 0.25rem;">{{ $asset->readable_size }} &bull; {{ $asset->mime_type }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin-top: 3rem;">
            {{ $assets->links() }}
        </div>
    @else
        <div style="text-align: center; padding: 5rem 0; background: var(--card-bg); border-radius: 1rem; border: 1px dashed var(--border);">
            <h3 style="color: var(--text-muted); font-weight: 500;">No media assets found.</h3>
            <p style="font-size: 0.875rem; color: var(--text-muted); margin-top: 0.5rem;">Start by uploading your first image!</p>
        </div>
    @endif
@endsection
