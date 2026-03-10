@extends('UserManagement::layouts.auth')

@section('title', 'Register')

@section('content')
    <h1>Create Account</h1>
    <p class="subtitle">Join Abriba and start sharing your stories</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            @error('email') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Register Now</button>
    </form>

    <div class="footer-link">
        Already have an account? <a href="{{ route('login') }}">Sign In</a>
    </div>
@endsection
