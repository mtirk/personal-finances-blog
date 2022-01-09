@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Edit profile')
    @section('content')
        <form class="form" method="POST" action="/profile/{{ $user->id }}" >
            @csrf <!--if one website pretends to be other website -->
            @method('PUT')<!-- transform POST method to PUT method-->

            <div class="container">
                <div class="mt-2 mb-5">
                    <h1>{{ __('Update profile') }}</h1>
                </div>
                <div class="mb-3">
            <label class="form-label"><b>{{ __('Change Name') }}: </b></label>
            <input id="name" type="text" placeholder="Enter Name" class="form-control @error('name') text-danger @enderror" 
              name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
          
            @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label"><b>{{ __('Change E-mail') }}: </b></label>
            <input id="email" type="text" placeholder="Enter Email" class="form-control @error('email') text-danger @enderror" 
              name="email" value="{{ $user->email }}" required autocomplete="email">

            @error('email')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
          </div>

                <button class="d-grid gap-2 col-3 mx-auto" type="submit">{{ __('Update') }}</button>
            </div>
        </form>
    @endsection