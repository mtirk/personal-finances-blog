@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Login')
    @section('content')
        <form class="form" method="POST" action="{{ route('login') }}">
            @csrf
        <div class="container">
            <h1>{{ __('Sign in') }}</h1>
            <p>Please fill in this form to sign in.</p>
            <hr>
            <div class="mb-3">
                <label class="form-label"><b>{{ __('E-mail Address') }}: </b></label>
                <input type="text" placeholder="Enter Email" class="form-control" 
                name="email" value="{{ old('email') }}" required autofocus>

                @error('email')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label"><b>{{ __('Password') }}: </b></label>
                <input type="password" placeholder="Enter Password" class="form-control @error('password') text-danger @enderror" name="password" required autofocus> 

                @error('password')
                <p class="text-danger">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <label for="remember">
            <input type="checkbox" name="remember"
                {{ old('remember') ? 'checked' : '' }}> 
            <span>{{ __('Remember me') }}</span>
            </label>
            <div class="form-group row">
                <div class="checkbox">
                    <p> Forgot your password?
                        <label>
                            <a href="{{ route('forget.password.get') }}">Reset Password</a>
                        </label>
                    </p>
                </div>
            </div>
            <button class="d-grid gap-2 col-3 mx-auto text-wrap w-50" type="submit">{{ __('Sign in') }}</button>
        </div>
        <hr class="m-1">
        <div class="container">
            <a href="/" type="button" class="cancelbtn">Cancel</a>
        </div>
        </form>
    @endsection

