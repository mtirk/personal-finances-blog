@foreach($comments as $comment)
    <div class="display-comment">
        <div class="border mb-3 w-50">
            <p><strong class="me-3 ms-3">{{ $comment->user->name }}</strong> on {{ $comment->updated_at }}</p>
            <p class="ms-3">{{ $comment->body }}</p>
            @if (isset(Auth::user()->id) && Auth::user()->id == $comment->user_id)
            <div class="d-grid gap-2 d-inline-flex justify-content-md-end mb-2 ms-2">
                <button type="button" class="btn btn-light btn-sm border"> 
                     <a href="/comment/{{ $comment->id }}/edit" class="btn p-0" role="button">
                        Edit
                     </a>
                </button>
            <div>
                <form action="/blog/{{ $comment->id }}" method="POST">
                @csrf
                @method('delete')
                    <button class="btn btn-danger btn-sm p-2 border" type="submit" onclick="return confirm('Are you sure? This action can not be undone!')">
                        Delete
                    </button>
                </form>
            </div>
            @endif
            </div>
        </div>
        <a href="" id="reply"></a>
        <form method="post" action="{{ route('reply/add') }}">
            @csrf
            <div class="form-group ms-5">
                <input type="text" name="comment_body" class="form-control w-50" />
                <input type="hidden" name="post_id" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />

                <input type="submit" class="btn btn-warning my-3" value="Reply" />
            </div>
        </form>
        @include('partials._comment_replies', ['comments' => $comment->replies])
    </div>
@endforeach