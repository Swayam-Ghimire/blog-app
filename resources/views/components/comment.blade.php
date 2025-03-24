@props(['post'])

@auth
    <!-- Comment Button -->
    <button class="cmt_btn" class="flex items-center text-gray-600 hover:text-gray-900" data-id="{{ $post->id }}">
        <i class="fas fa-comment text-lg mr-1"></i>
        <span class="text-sm">{{ $post->comments->count() }}</span>
    </button>

    <!-- Comment Form Section -->
    <div class="comment-form" id="comment-form-{{ $post->id }}" style="display:none;">
        <div class="max-h-64 overflow-y-auto space-y-4">
            <!-- List of Comments -->
            @foreach($post->comments as $comment)
                <div class="flex items-start space-x-3 bg-white p-3 rounded-lg shadow-sm">
                    <!-- User Profile Image -->
                    <div class="user-avatar">
                        @if($comment->user->img_path)
                            <img src="{{ asset('storage/' . $comment->user->img_path) }}" alt="User Image" class="w-full h-full object-cover">
                        @else
                            <div class="bg-gray-300 w-10 h-10 flex items-center justify-center rounded-full">
                                <i class="fas fa-user text-gray-600"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Comment Content -->
                    <div class="flex justify-between w-full bg-gray-50">
                        <div class="p-3 rounded-lg w-full">
                            <p class="font-semibold text-gray-800">{{ $comment->user->name }}</p>
                            <p class="text-gray-700 text-sm">{{ $comment->body }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</p>
                        </div>
                        @can('view', $comment)
                            <div class="p-3">
                                <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-inherit">
                                        <i class="fas fa-trash text-red-500 hover:text-red-700 cursor-pointer"></i>
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                </div>
            @endforeach

            <!-- No Comments Message -->
            @if($post->comments->isEmpty())
                <p class="text-sm text-gray-600 text-center">No comments yet. Be the first to comment!</p>
            @endif
        </div>

        <!-- Add Comment Form -->
        <form action="{{ route('comments.store', $post->id) }}" method="post" class="mt-3">
            @csrf
            <div class="flex items-center space-x-3">
                <textarea name="comment" rows="2" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-700 text-sm" placeholder="Write a comment..."></textarea>
                <button type="submit">Post</button>
            </div>
        </form>
    </div>
@endauth
