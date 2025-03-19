<x-layout>

    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6 mt-10">
        <!-- Page Title -->
        <h1 class="text-xl font-bold text-gray-800 mb-1.5">Edit Post</h1>

        <!-- Edit Form -->
        <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required value={{ old('title', $post->title) }}>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $post->content) }}</textarea>
            </div>

            <!-- Current Image Preview -->
            <div class="form-group">
                <label>Current Picture</label>
                @if($post->picture)
                    <img src="{{ asset('storage/' . $post->picture) }}" alt="Post Image" class="w-full h-96 object-cover rounded-lg mt-2">
                @else
                    <p class="text-gray-500 text-sm mt-2">No image available.</p>
                @endif
            </div>

            <!-- Upload New Picture -->
            <div>
                <label for="picture" class="block text-sm font-medium text-gray-700">Upload New Picture</label>
                <input type="file" name="picture" id="picture" class="mt-1 block w-full text-sm text-gray-600 border border-gray-300 rounded-lg cursor-pointer focus:ring-indigo-500 focus:border-indigo-500">
                <p class="text-xs text-gray-500 mt-1">JPEG, PNG, JPG, GIF (Max: 10MB)</p>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center">
                <button type="submit" class="sub">
                    Update Post
                </button>
                <a href="{{ route('post.index') }}" class="text-gray-600 hover:text-gray-900">
                    Cancel
                </a>
            </div>
            <x-error/>
        </form>
    </div>

</x-layout>
