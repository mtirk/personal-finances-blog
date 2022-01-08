<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Personal finances management page</title>
        <link rel="stylesheet" type="text/css" href="{{ url('/css/welcome.css') }}" />
    </head>
    <body>
        <div class="content">
            <div class="text">
                <h1 class="text-center">Want to plan your budget?</h1>
                <p class="text-center my-2">This page will help you to get better at managing your finances!</p>
            </div>
            <div class="buttons d-grid gap-2 d-inline-flex">
                <a class="btn1" href="{{ route('login') }}">{{__('Login') }}</a>
                @if (Route::has('register'))
                    <a class="btn2" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>
            <div class="footer">
                <p class="my-6">Just want to read our blog?</p>
                <div class="center">
                    <a class="btn3" href="/blog">{{__('Blog') }}</a>
                </div>
            </div>
        </div>        
    </body>
</html>