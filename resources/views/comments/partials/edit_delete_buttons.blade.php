@if (!Auth::guest())
    <div class="btn-group" role="group" aria-label="Delete and edit buttons">
        @if (auth()->user()->can('update any comment') || auth()->user()->id == $comment->user_id)
            <a href="/comment/{{ $comment->id }}/edit" class="btn btn-primary">Edit</a>
        @endif
        @if (auth()->user()->can('delete any comment') || auth()->user()->id == $comment->user_id)
            <button class="btn btn-danger">Delete</button>
        @endif
    </div>
@endif
