<!DOCTYPE html>
<html lang="en">
    @include('/partials/_head')
    <body>
        @include('/partials/_nav')
        <div class=container>
            @yield('content')<!-- this part is going to be different-->
            @include('/partials/_footer')
        </div>
    </body>
</html>