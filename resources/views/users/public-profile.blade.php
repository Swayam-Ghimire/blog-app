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
                <div class="user-avatar w-32 h-32 mx-auto">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=FFFFFF&background=6366F1" alt="Profile photo" class="user-avatar w-full h-full">
                </div>
            @endif

            <!-- User Name -->
            <h2 class="text-2xl font-bold text-gray-800 mt-4">{{ $user->name }}</h2>
            <p class="text-gray-600 text-sm">{{ $user->email }}</p>
        </div>

        <!-- Posts List -->
        @if(!(empty($posts))) 
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-700 mb-4 border-b pb-2">{{ $user->name }} Posts</h3>

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
            <p class="text-gray-600 text-center mt-6">{{ $user->name }} has not created any posts yet.</p>
        @endif
    </div>
</x-layout>
