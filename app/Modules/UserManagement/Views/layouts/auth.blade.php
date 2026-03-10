<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Abriba</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg: #0f172a;
            --card-bg: #1e293b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --input-bg: #334155;
            --input-border: #475569;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            color: var(--text-main);
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .auth-card {
            background-color: var(--card-bg);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 { font-size: 1.875rem; font-weight: 700; margin-bottom: 0.5rem; text-align: center; }
        p.subtitle { color: var(--text-muted); text-align: center; margin-bottom: 2rem; font-size: 0.875rem; }

        .form-group { margin-bottom: 1.25rem; }
        label { display: block; font-size: 0.875rem; font-weight: 500; margin-bottom: 0.5rem; }
        input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid var(--input-border);
            background-color: var(--input-bg);
            color: white;
            box-sizing: border-box;
            transition: border-color 0.2s;
        }
        input:focus { outline: none; border-color: var(--primary); }

        button {
            width: 100%;
            padding: 0.75rem;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 1rem;
        }
        button:hover { background-color: var(--primary-hover); }

        .footer-link { text-align: center; margin-top: 1.5rem; font-size: 0.875rem; color: var(--text-muted); }
        .footer-link a { color: var(--primary); text-decoration: none; font-weight: 500; }

        .error { color: #f87171; font-size: 0.875rem; margin-top: 0.25rem; }
    </style>
</head>
<body>
    <div class="auth-card">
        @yield('content')
    </div>
</body>
</html>
