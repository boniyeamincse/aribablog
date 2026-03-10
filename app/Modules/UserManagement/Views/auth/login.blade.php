@extends('UserManagement::layouts.auth')

@section('title', 'Login')

@section('content')
    <h1>Welcome Back</h1>
    <p class="subtitle">Enter your credentials to access your account</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit">Sign In</button>
    </form>

    <div class="footer-link">
        Don't have an account? <a href="{{ route('register') }}">Create one</a>
    </div>
@endsection
