<x-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <!-- Post Title -->
        <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $post->title }}</h1>

        <!-- Post Author and Date -->
        <div class="flex justify-between">
            <div class="flex items-center text-gray-600 text-sm mb-6">
                <span class="mr-2">By <strong>{{ $post->user->name }}</strong></span>
                <span class="mx-2">•</span>
                <span>{{ $post->created_at->format('M d, Y') }}</span>
            </div>
            <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-900">
                <i class="fas fa-arrow-left"></i>
            </a>
        </div>

        <!-- Post Image or Placeholder -->
        <div class="thumbnail rounded-lg">
            @if($post->picture)
                <img src="{{ asset('storage/' . $post->picture) }}" alt="Post Image" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-200 flex flex-col items-center justify-center">
                    <i class="fas fa-image fa-4x text-gray-500"></i>
                    <p class="text-sm text-gray-600 mt-2">No picture available</p>
                </div>
            @endif
        </div>

        <!-- Post Content -->
        <div class="prose max-w-none text-gray-800 mb-8 leading-relaxed">
            {!! nl2br(e($post->content)) !!}
        </div>

        <!-- Post Actions -->
       <x-options :post="$post"/>
    </div>
</x-layout>
