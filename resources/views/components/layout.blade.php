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
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
                <!-- Brand & Description -->
                <div>
                    <h2 class="text-2xl font-bold">The Blogging App</h2>
                    <p class="text-gray-200 text-sm mt-2">
                        Share your thoughts with the world.
                    </p>
                </div>
    
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold">Quick Links</h3>
                    <ul class="mt-2 space-y-2">
                        <li><a href="{{ route('home') }}" class="links">Home</a></li>
                        <li><a href="{{ route('post.index') }}" class="links">All Posts</a></li>
                        <li><a href="{{ route('post.create') }}" class="links">Write a Post</a></li>
                        <li><a href="{{ route('auth.login') }}" class="links">Login</a></li>
                    </ul>
                </div>
    
                <!-- Contact & Social Links -->
                <div>
                    <h3 class="text-lg font-semibold">Contact</h3>
                    <p class=icons">
                        <i class="fas fa-phone-alt mr-2"></i>
                        <span class="text-sm">
                            +977 9862331144
                        </span>
                    </p>
                    <a href="mailto:swayamghi.dev@gmail.com" class="icons hover:text-gray-300 transition duration-300">
                        <i class="fas fa-envelope mr-2"></i> swayamghi.dev@gmail.com
                    </a>
    
                    <!-- Social Icons -->
                    <div class="flex justify-center md:justify-start space-x-5 mt-4">
                        <a href="https://x.com/SwayamGhimire" target="_blank" class="social-links">
                            <i class="fab fa-x text-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/swayam-ghimire-689076266/" target="_blank" class="social-links">
                            <i class="fab fa-linkedin-in text-lg"></i>
                        </a>
                        <a href="https://github.com/Swayam-Ghimire" target="_blank" class="social-links">
                            <i class="fab fa-github text-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
    
            <!-- Copyright -->
            <div class="border-t border-gray-400 mt-6 mb-0 pt-4 text-center text-sm text-gray-300">
                &copy; {{ date('Y') }} The Blogging App. All rights reserved.
            </div>
        </div>
    </footer>
    
    
</body>
</html>