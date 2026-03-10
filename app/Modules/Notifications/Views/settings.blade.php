@extends('Blog::layouts.blog')

@section('title', 'Notification Settings')

@section('content')
    <div style="margin-bottom: 3rem;">
        <h1 style="font-size: 2rem; font-weight: 700;">Notification Settings</h1>
        <p style="color: var(--text-muted); font-size: 0.875rem;">Choose how and when you want to be notified.</p>
    </div>

    <form action="{{ route('notifications.update') }}" method="POST">
        @csrf
        
        <div style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 1rem; overflow: hidden;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border); background: rgba(255,255,255,0.02);">
                        <th style="padding: 1.25rem 1.5rem; font-weight: 600;">Notification Type</th>
                        @foreach($channels as $channel)
                            <th style="padding: 1.25rem 1.5rem; font-weight: 600; text-transform: capitalize; text-align: center;">{{ $channel }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($types as $type)
                        <input type="hidden" name="types[]" value="{{ $type }}">
                        <tr style="border-bottom: 1px solid var(--border);">
                            <td style="padding: 1.25rem 1.5rem;">
                                <div style="font-weight: 600; color: white;">{{ str_replace('_', ' ', ucwords($type, '_')) }}</div>
                                <div style="font-size: 0.75rem; color: var(--text-muted);">Get alerts when this occurs.</div>
                            </td>
                            @foreach($channels as $channel)
                                <input type="hidden" name="channels[]" value="{{ $channel }}">
                                <td style="padding: 1.25rem 1.5rem; text-align: center;">
                                    @php
                                        $pref = $preferences->where('notification_type', $type)->where('channel', $channel)->first();
                                        $checked = $pref ? $pref->is_enabled : true;
                                    @endphp
                                    <input type="checkbox" name="prefs[{{ $type }}][{{ $channel }}]" {{ $checked ? 'checked' : '' }}
                                        style="width: 1.2rem; height: 1.2rem; cursor: pointer; accent-color: var(--primary);">
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem; display: flex; justify-content: flex-end;">
            <button type="submit" style="background: var(--primary); color: white; border: none; padding: 0.75rem 2rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer; transition: background 0.2s;">
                Save Changes
            </button>
        </div>
    </form>
@endsection
