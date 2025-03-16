<div class="card">
    <a href="{{ route('post.show', $post->id) }}">
        @if($post->picture)
            <img src="{{ asset('storage/' . $post->picture) }}" alt="post picture" class="w-full h-56 object-cover rounded-t-lg">
        @else
            <div class="bg-gray-200 p-6 flex flex-col items-center justify-center rounded-t-lg">
                <i class="fas fa-image fa-4x text-gray-500"></i>
                <p class="text-sm text-gray-600 mt-2">No picture available</p>
            </div>
        @endif 
    
        <div class="card-header">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-user">By {{ $post->user->name }}</p>
            <p class="card-date">Posted on {{ $post->created_at->format('M d, Y') }}</p>
        </div>
    
        <div class="card-body">
            <p class="card-description">
                {{ Str::limit($post->content, 70) }}
                @if (strlen($post->content) > 70)
                    <a href="{{ route('post.show', $post->id) }}" class="card-readmore">Read more</a>
                @endif
            </p>
        </div>
    </a>

    <div class="comment-form">
        <form action="" method="POST">
            @csrf
            <textarea name="comment" rows="3" placeholder="Add a comment..."></textarea>
            <button type="submit" class="cursor-pointer">Submit</button>
        </form>
    </div>
</div>
