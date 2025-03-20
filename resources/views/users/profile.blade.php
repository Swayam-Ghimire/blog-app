<x-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <!-- Profile Header -->
        <div class="text-center">
            <!-- Profile Photo -->
            @if($user->img_path)
                <img src="{{ asset('storage/' . $user->img_path) }}" 
                     alt="Profile Photo" 
                     class="w-32 h-32 rounded-full mx-auto object-cover border-4 border-indigo-500 shadow-md">
            @else
                <div class="w-32 h-32 rounded-full mx-auto bg-gray-200 flex items-center justify-center shadow-md">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=FFFFFF&background=6366F1" alt="Profile photo">
                </div>
            @endif
            <!-- Profile Picture Upload Form -->
            <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data" class="relative mt-4">
                @csrf
                <input type="file" name="profile_photo" id="profileUpload" class="hidden" accept="image/*" onchange="this.form.submit()">
                
                <label for="profileUpload" class="absolute bottom-0 right-90 text-black z-10 p-2 rounded-full shadow-md cursor-pointer">
                    <i class="fas fa-camera"></i>
                </label>
            </form>

            <!-- User Name -->
            <h2 class="text-2xl font-bold text-gray-800 mt-4">{{ $user->name }}</h2>
            <p class="text-gray-600 text-sm">{{ $user->email }}</p>
        </div>

        <!-- Posts List -->
        @if(!(empty($posts))) 
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">Your Posts</h3>

                <!-- List of Posts -->
                <ul class="space-y-4">
                    @foreach ($posts as $post)
                        <li class="p-4 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition duration-300">
                            <a href="{{ route('post.show', $post->id) }}" class="text-lg text-indigo-600 font-medium hover:underline">
                                {{ $post->title }}
                            </a>
                            <p class="text-sm text-gray-500 mt-1">
                                Posted on {{ $post->created_at->format('M d, Y') }}
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <p class="text-gray-600 text-center mt-6">You have not created any posts yet.</p>
        @endif

        <!-- Logout Button -->
        <div class="mt-8 text-center">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="end">
                    Logout
                </button>
            </form>
        </div>
    </div>
</x-layout>
