@foreach($comments as $comment)
    <div class="display-comment">
        <div class="border mb-3 w-50">
            <p><strong class="me-3 ms-3">{{ $comment->user->name }}</strong> on {{ $comment->updated_at }}</p>
            <p class="ms-3">{{ $comment->body }}</p>
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