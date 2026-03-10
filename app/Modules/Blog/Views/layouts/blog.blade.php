<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Abriba Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #8b5cf6;
            --primary-light: #a78bfa;
            --bg: #030712;
            --card-bg: #111827;
            --border: #1f2937;
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --accent-gradient: linear-gradient(135deg, #8b5cf6 0%, #d946ef 100%);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            margin: 0;
            line-height: 1.6;
        }

        .container { max-width: 1000px; margin: 0 auto; padding: 0 1.5rem; }

        header {
            padding: 2rem 0;
            border-bottom: 1px solid var(--border);
            margin-bottom: 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            text-decoration: none;
            color: white;
            background: var(--accent-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav a {
            color: var(--text-muted);
            text-decoration: none;
            margin-left: 2rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        nav a:hover { color: white; }

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .post-card {
            background: var(--card-bg);
            border: 1px solid var(--border);
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.3s, border-color 0.3s;
            text-decoration: none;
            color: inherit;
        }
        .post-card:hover { transform: translateY(-5px); border-color: var(--primary); }

        .post-content { padding: 1.5rem; }
        .post-category {
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--primary-light);
            margin-bottom: 0.5rem;
            display: block;
        }
        .post-title { font-size: 1.25rem; font-weight: 600; margin-bottom: 0.75rem; }
        .post-excerpt { color: var(--text-muted); font-size: 0.875rem; margin-bottom: 1.5rem; }
        .post-meta { font-size: 0.75rem; color: var(--text-muted); display: flex; align-items: center; }

        footer {
            margin-top: 5rem;
            padding: 3rem 0;
            border-top: 1px solid var(--border);
            text-align: center;
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        /* Detail View */
        article h1 { font-size: 3rem; font-weight: 700; margin-bottom: 1rem; }
        .article-meta { margin-bottom: 3rem; color: var(--text-muted); display: flex; gap: 1rem; }
        .article-body { font-size: 1.125rem; }
        .article-body p { margin-bottom: 1.5rem; }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <a href="/" class="logo">ABRIBA</a>
            <nav>
                <a href="/">Home</a>
                @auth
                    <a href="/dashboard">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer; font:inherit; margin-left:2rem;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            &copy; {{ date('Y') }} Abriba Blog Platform. Built with Laravel Blade & Passion.
        </footer>
    </div>
</body>
</html>
