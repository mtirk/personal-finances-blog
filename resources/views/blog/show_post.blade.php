@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Create a post')
    @section('content')
        <h1>{{ $post->title }}</h1>
    <div class="container">
        <span>
            By <i><b>{{ $post->user->name }}</b></i> Created on <b>{{ date('jS M Y', strtotime($post->updated_at))}}</b>
        </span>
        <div>
            <img class="w-50 h-25 p-2 my-2" src="{{ asset('images/' . $post->image_path) }}" alt="">
        </div>  
        <p>
           {{ $post->body }} 
        </p>
        <hr />
        <h4 class="my-3">Comments: </h4>
        @include('partials._comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
        <p class="fs-4 my-3">Add comment</p>
        <form method="post" action="{{ route('comment/add') }}">
            @csrf
            <div class="form-group">
                <input type="text" name="comment_body" class="form-control w-50" required />
                <input type="hidden" name="post_id" value="{{ $post->id }}" />
            </div>
            <div class="form-group my-3">
                <input type="submit" class="btn btn-warning" value="Add Comment" />
            </div>
        </form>
    </div>
    @endsection