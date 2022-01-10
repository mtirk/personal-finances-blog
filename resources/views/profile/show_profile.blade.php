@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| My profile')
@section('content')
   <div class="header">
      <h1 class="mt-3 mb-5">My profile</h1>
   </div>
   @if (session()->has('message'))
      <div class="w-4/5 m-auto mt-10 pl-2">
         <p class="text-success">
            <b>
               {{ session()->get('message') }}
            </b>
         </p>
      </div>
   @endif
   <div class="row">
        <div class="col-4">
            <div class="card">
                <h3 class="mb-4">Profile information</h3>
                <p>Your user name: <b>{{ $user->name }}</b></p>
                <p>Yor profile was created at: <b>{{ date('jS M Y', strtotime($user->created_at)) }}</b><p>
                <div class="d-grid gap-2 d-inline-flex justify-content-md-end">
                <button type="button" class="btn btn-light btn-sm border"> 
                    <a href="/profile/{{ $user->id }}/edit" class="btn p-0" role="button">
                        Edit
                    </a>
                </button>
                <form action="/profile/{{ $user->id }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm p-2 border" type="submit" onclick="return confirm('Are you sure? This action can not be undone!')">
                        Delete profile
                    </button>
                </form>
                </div>
            </div>
        </div>
        <div class="col-8">
            <h3 class="text-center">My posts:</h3>
        @foreach ($posts as $post)
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id)
                <div class="card">
                    <h2>{{ $post->title }}</h2>
                    <span class="mb-3">By <b>{{ $post->user->name }}, </b> Created on <b>{{ date('jS M Y', strtotime($post->updated_at))}}</b></span>
                    <img class="post-img" src="{{ asset('images/' . $post->image_path) }}" alt="">
                    <p class="mt-3">{{ $post->body }}</p>
                    <a href="/blog/{{ $post->slug }}">
                    Keep reading
                    </a>
                    <div class="d-grid gap-2 d-inline-flex justify-content-md-end">
                    <button type="button" class="btn btn-light btn-sm border"> 
                        <a href="/blog/{{ $post->slug }}/edit" class="btn p-0" role="button">
                            Edit
                        </a>
                    </button>
                    <div>
                        <form action="/blog/{{ $post->slug }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-sm p-2 border" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                    </div>
                </div>
            @endif
        @endforeach
        </div>
   </div>
   <!--
      <div class="col-4">
         <div class="card">
            <h3>Popular Post</h3>
            <div class="fakeimg">Image</div><br>
            <div class="fakeimg">Image</div><br>
            <div class="fakeimg">Image</div>
         </div>
      </div>
   </div> -->
@endsection
