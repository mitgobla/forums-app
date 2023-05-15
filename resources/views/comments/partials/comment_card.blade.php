<div class="card p-2">
    <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted">Written {{$comment->created_at->diffForHumans()}} by <a href="/users/{{$comment->user->id}}">{{$comment->user->name}}</a></h6>
        <p class="card-text">{{$comment->body}}</p>
    </div>
    {{-- edit and delete buttons --}}
    <div class="card-footer">
        @include('comments.partials.edit_delete_buttons', ['comment' => $comment])
        @if(isset($showPost))
            @if($showPost)
                <a href="/posts/{{$comment->post->id}}" class="card-link">See Post</a>
            @endif
        @endif
    </div>
</div>