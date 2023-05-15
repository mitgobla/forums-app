<div class="card p-2">
    <h6 class="card-subtitle mb-2 text-muted">Written {{$comment->created_at->diffForHumans()}} by <a href="/users/{{$comment->user->id}}">{{$comment->user->name}}</a></h6>
    <p class="card-text">{{$comment->body}}</p>
    {{-- edit and delete buttons --}}
    @include('comments.partials.edit_delete_buttons', ['comment' => $comment])
</div>