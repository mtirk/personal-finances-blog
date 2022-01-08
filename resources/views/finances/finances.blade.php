@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Finances')
@section('content')
   <div class="header">
      <h1>My finances</h1>
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
         <a href="/plan" class="btn btn-lg" role="button">Plan month</a>
      </div>
   @endif
   <div class="row">
   @foreach ($finances as $finance)
   @if (isset(Auth::user()->id) && Auth::user()->id == $finance->user_id)
      <div class="col-8">
         <div class="card">
            <span class="mb-1">Created on <b>{{ date('jS M Y', strtotime($finance->updated_at))}}</b></span>
            <h1 class="mb-4 mt-2 text-center">{{ $finance->month->month }}</h1>
            <p class="fs-4 mx-4">You spent  
               <a href="/finances/{{ $finance->id }}" class="text-decoration-none text-dark">
                  <b>{{ ($finance->housing) + ($finance->transportation) + ($finance->food) + ($finance->utilities) + ($finance->clothing) 
                     + ($finance->healthcare) + ($finance->insurance) + ($finance->household_supplies) + ($finance->personal)
                     + ($finance->debt) + ($finance->retirement) + ($finance->education) + ($finance->savings) + ($finance->gifts)
                     + ($finance->entertainment) + ($finance->unexpected)}} 
                  </b>
               </a>
            </p>

            <div class="d-grid gap-2 d-inline-flex justify-content-md-end">
               <button type="button" class="btn btn-light btn-sm border"> 
                  <a href="/finances/{{ $finance->id }}/edit" class="btn p-0" role="button">
                     Edit
                  </a>
               </button>
               <form action="/finances/{{ $finance->id }}" method="POST">
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

@endsection
