<div class="card">
    
    <div class="card-header">
        <h2 class="card-title">{{ $post->title }}</h2>
        <p class="card-user">By {{ $post->user->name }}</p>
        <p class="card-date">Posted on {{ $post->created_at->format('M d, Y') }}</p>
    </div>

    <div class="thumbnail">
        @if($post->picture)
            <img src="{{ asset('storage/' . $post->picture) }}" alt="Post Image" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gray-200 flex flex-col items-center justify-center">
                <i class="fas fa-image fa-4x text-gray-500"></i>
                <p class="text-sm text-gray-600 mt-2">No picture available</p>
            </div>
        @endif
    </div>
    
    <div class="card-body">
        <p class="card-description">
            {{ Str::limit($post->content, 15) }}
            @if (strlen($post->content) > 15)
                <a href="{{ route('post.show', $post->id) }}" class="card-readmore">Read more</a>
            @endif
        </p>
        <x-options :post="$post" />
    </div>

    <div class="comment-form">
        <form action="" method="POST">
            @csrf
            <textarea name="comment" rows="3" placeholder="Add a comment..."></textarea>
            <button type="submit" class="cursor-pointer">Submit</button>
        </form>
    </div>
</div>
