<div class="card">
    <div class="card-header">
        <div>
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-user">By {{ $post->user->name }}</p>
            <p class="card-date">Posted on {{ $post->created_at->format('M d, Y') }}</p>
        </div>
        <a href="{{ route('post.edit', $post->id) }}" class="card-edit">Edit</a>
    </div>
    <div class="card-body">
        <p class="card-description">
            {{ Str::limit($post->content, 200) }}
            @if (strlen($post->content) > 200)
                <a href="" class="card-readmore">Read more</a>
            @endif
        </p>
      
    </div>
    <div class="comment-form">
        <form action="" method="POST">
            @csrf
            <textarea name="comment" rows="3" placeholder="Add a comment..."></textarea>
            <button type="submit" class="cursor-pointer">Submit</button>
        </form>
    </div>
</div>