@auth
    @if(Auth::id() === $post->user_id)
    <div class="mt-6 flex justify-between items-center border-t pt-4">
        <!-- Edit Button -->
        <a href="{{ route('post.edit', $post->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
            Edit Post
        </a>
        
        <!-- Delete Button -->
        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="end">
                Delete Post
            </button>
        </form>
    </div>
    @endif
@endauth