@if (!Auth::guest())
    <div class="btn-group" role="group" aria-label="Delete and edit buttons">
        @if (auth()->user()->can('update any comment') || auth()->user()->id == $comment->user_id)
            <a href="/comment/{{ $comment->id }}/edit" class="btn btn-primary">Edit</a>
        @endif
        @if (auth()->user()->can('delete any comment') || auth()->user()->id == $comment->user_id)
            <button class="btn btn-danger"
                onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">Delete</button>
        @endif
    </div>

    <form id="delete-form" action="{{ route('comment.destroy', $comment) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endif
