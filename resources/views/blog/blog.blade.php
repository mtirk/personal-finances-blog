@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Blog')
@section('content')
   <div class="header">
      <h2>Blog</h2>
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

   @if (Auth::check())
      <div class="btn-create">
         <a href="/create" class="btn btn-lg" role="button">Create post</a>
      </div>
   @endif
   <div class="row">
   @foreach ($posts as $post)
      <div class="col-8">
         <div class="card">
            <h2>{{ $post->title }}</h2>
            <span class="mb-3">By <b>{{ $post->user->name }}, </b> Created on <b>{{ date('jS M Y', strtotime($post->updated_at))}}</b></span>
            <img class="post-img" src="{{ asset('images/' . $post->image_path) }}" alt="">
            <p class="mt-3">{{ $post->body }}</p>
            <a href="/blog/{{ $post->slug }}">
               Keep reading
            </a>
            @if (Auth::check())
            @if (isset(Auth::user()->id) && Auth::user()->id == $post->user_id || Auth::user()->user_type == 'Administrator') <!--checking if logged in user_id is the same as post id to see if can edit-->
               <div class="d-grid gap-2 d-inline-flex justify-content-md-end">
               @if (Auth::user()->user_type != 'Administrator')
                  <button type="button" class="btn btn-light btn-sm border"> 
                     <a href="/blog/{{ $post->slug }}/edit" class="btn p-0" role="button">
                        Edit
                     </a>
                  </button>
               @endif
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
            @endif
            @endif
         </div>
      </div>
   @endforeach
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
