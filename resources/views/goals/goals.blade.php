@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Goals')
@section('content')
   <div class="header">
      <h2>My goals</h2>
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
         <a href="/add" class="btn btn-lg" role="button">Add goal</a>
      </div>
   @endif
   
   <div class="row">
   @foreach ($goals as $goal)
   @if (isset(Auth::user()->id) && Auth::user()->id == $goal->user_id)
      <div class="card my-3 {{ ($goal->done == 1) ? 'bg-secondary bg-gradient bg-opacity-10' : '' }}">
         @if ($goal->done == 1)
         <h2 class="text-center text-warning text-opacity-50"><b>Good job, you have reached this goal!</b></h2>
         @endif
            <span class="mb-1">Created on <b>{{ date('jS M Y', strtotime($goal->updated_at))}}</b></span>
            <h2 class="my-1">{{ $goal->goal }}</h2>
            <p class="mt-3 lh-base">{{ $goal->description }}</p>
            <span class="my-2"><i>Due date</i> <b>{{ date('jS M Y', strtotime($goal->finish_date))}}</b></span>

            <div class="d-grid gap-2 d-inline-flex justify-content-md-end">
               <button type="button" class="btn btn-light btn-sm border"> 
                  <a href="/goals/{{ $goal->slug }}/edit" class="btn p-0" role="button">
                     Edit
                  </a>
               </button>
               <form action="/goals/{{ $goal->slug }}" method="POST">
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger btn-sm p-2 border" type="submit">
                     Delete
                  </button>
               </form>
            </div>
      </div>
   @endif
   @endforeach
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
