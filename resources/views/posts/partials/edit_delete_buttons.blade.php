@if (!Auth::guest())
    <div class="btn-group" role="group" aria-label="Delete and edit buttons">
        @if (auth()->user()->can('update any post') || auth()->user()->id == $post->user_id)
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
        @endif
        @if (auth()->user()->can('delete any post') || auth()->user()->id == $post->user_id)
            <button class="btn btn-danger"
                onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">Delete</button>
        @endif
    </div>

    <form id="delete-form" action="{{ route('posts.destroy', $post) }}" method="POST" class="d-none">
        @csrf
        @method('DELETE')
    </form>
@endif
