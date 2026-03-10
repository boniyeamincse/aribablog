@extends('Blog::layouts.blog')

@section('title', 'Admin Settings')

@section('content')
    <div style="margin-bottom: 3rem;">
        <h1 style="font-size: 2rem; font-weight: 700;">Site Settings</h1>
        <p style="color: var(--text-muted); font-size: 0.875rem;">Configure your Abriba blog global parameters.</p>
    </div>

    @if(session('success'))
        <div style="background: rgba(16, 185, 129, 0.1); border: 1px solid #10b981; color: #10b981; padding: 1rem; border-radius: 0.5rem; margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: grid; gap: 3rem;">
        <!-- General Settings -->
        <section>
            <h2 style="font-size: 1.25rem; margin-bottom: 1.5rem; color: var(--primary-light);">General Configuration</h2>
            <form action="{{ route('admin.settings.update') }}" method="POST" style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 1rem; padding: 2rem;">
                @csrf
                <input type="hidden" name="group" value="general">
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Site Title</label>
                    <input type="text" name="site_title" value="{{ setting('site_title', 'Abriba Blog') }}" style="width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white;">
                </div>

                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Site Description</label>
                    <textarea name="site_description" rows="3" style="width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white;">{{ setting('site_description') }}</textarea>
                </div>

                <button type="submit" style="background: var(--primary); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">Save General Settings</button>
            </form>
        </section>

        <!-- Mail Settings -->
        <section>
            <h2 style="font-size: 1.25rem; margin-bottom: 1.5rem; color: var(--primary-light);">SMTP / Mail Settings</h2>
            <form action="{{ route('admin.settings.update') }}" method="POST" style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 1rem; padding: 2rem;">
                @csrf
                <input type="hidden" name="group" value="email">
                
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Mail Host</label>
                        <input type="text" name="mail_host" value="{{ setting('mail_host') }}" placeholder="smtp.mailgun.org" style="width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Mail Port</label>
                        <input type="text" name="mail_port" value="{{ setting('mail_port') }}" placeholder="587" style="width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white;">
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Username</label>
                        <input type="text" name="mail_username" value="{{ setting('mail_username') }}" style="width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white;">
                    </div>
                    <div>
                        <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Password</label>
                        <input type="password" name="mail_password" value="{{ setting('mail_password') }}" style="width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: white;">
                    </div>
                </div>

                <button type="submit" style="background: var(--primary); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">Save Email Settings</button>
            </form>
        </section>

        <!-- Integrations -->
        <section>
            <h2 style="font-size: 1.25rem; margin-bottom: 1.5rem; color: var(--primary-light);">Third-Party Integrations</h2>
            <form action="{{ route('admin.settings.update') }}" method="POST" style="background: var(--card-bg); border: 1px solid var(--border); border-radius: 1rem; padding: 2rem;">
                @csrf
                <input type="hidden" name="group" value="integrations">
                
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 600;">Header Scripts (GTM, Analytics, etc.)</label>
                    <textarea name="header_scripts" rows="5" placeholder="<script>...</script>" style="font-family: monospace; width: 100%; padding: 0.75rem; background: var(--bg); border: 1px solid var(--border); border-radius: 0.5rem; color: #10b981;">{{ setting('header_scripts') }}</textarea>
                    <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.5rem;">These scripts will be injected into the &lt;head&gt; section.</p>
                </div>

                <button type="submit" style="background: var(--primary); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 0.5rem; font-weight: 600; cursor: pointer;">Save Integrations</button>
            </form>
        </section>
    </div>
@endsection
