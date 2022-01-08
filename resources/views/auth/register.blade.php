@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Register')
    @section('content')
      <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container">
          <h1>{{ __('Register') }}</h1>
          <p>Please fill in this form to create an account.</p>
          <hr>
          <div class="mb-3">
            <label class="form-label"><b>{{ __('Name') }}: </b></label>
            <input id="name" type="text" placeholder="Enter Name" class="form-control @error('name') text-danger @enderror" 
              name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          
            @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label"><b>{{ __('E-mail') }}: </b></label>
            <input id="email" type="text" placeholder="Enter Email" class="form-control @error('email') text-danger @enderror" 
              name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
          </div>

          <div class="mb-3">
            <label class="form-label"><b>{{ __('Password') }}: </b></label>
            <input id="pasw" type="password" placeholder="Enter Password" class="form-control @error('password') text-danger @enderror" 
            name="password"  required autocomplete="new-password">

            @error('password')
            <p class="text-danger">
                {{ $message }}
            </p>
            @enderror
          </div>

          <div class="mb-3">
            <label for="password-confirm" class="form-label"><b>{{ __('Confirm Password') }}: </b></label>

            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control"
                name="password_confirmation" required autocomplete="new-password">
          </div>

          <hr>
          <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

          <button class="d-grid gap-2 col-3 mx-auto text-wrap w-50" type="submit" class="registerbtn">{{ __('Register') }}</button>
        </div>
        
        <div class="container signin">
          <p>{{ __('Already have an account? ') }}<a href="{{ route('login') }}">{{ __('Sign in') }}</a></p>
        </div>
      </form>
    @endsection