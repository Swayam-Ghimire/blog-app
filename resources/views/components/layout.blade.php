<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="keyword" content="Blog, latest blog, laravel">
        <title>{{ $title ?? 'The Blog App' }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/form.css'])
    </head>
<body class="bg-gray-100 font-sans">
    <!-- Navigation -->
    <div class="contents">
        <nav id="navbar">
            <div id="logo">
                <h3>The Blog-App</h3>
            </div>
            <ul>
                @auth
                <span class="user greeting border-r-2 pr-2">
                    Hi {{ Auth::user()->name }} 
                </span>
                <li><a href="{{ route('post.index') }}" class="btn">All Posts</a></li>
                <li><a href="{{ route('post.create') }}" class="btn">Add Your Post</a></li>
                @if(Auth::user()->img_path)
                    <li>
                        <a href="{{ route('users.profile') }}">
                            <img src="{{ asset('storage/' . Auth::user()->img_path) }}" class="user-avatar">
                        </a>
                    </li>
                    @else
                        <li>
                            <a href="" class="user-avatar">
                                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=FFFFFF&background=6366F1" alt="Profile photo" class="user-avatar">
                            </a>
                        </li>
                    @endif
                @endauth
                @guest
                <li><a href="{{ route('home') }}" class="btn">Latest Post</a></li>
                <li><a href="{{ route('auth.register') }}" class="btn">Register</a></li>
                <li><a href="{{ route('auth.login') }}" class="btn">Login</a></li>
                @endguest
            </ul>
        </nav>
        <x-message/>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto p-4">
        {{ $slot }}
    </div>
    <br>
    <!-- Footer -->
    <footer>
        <p class="text-white-800">&copy; {{ date('Y') }} The Blogging App. All rights reserved.</p>
    </footer>
</body>
</html>