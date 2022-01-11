@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Homepage')
    @section('content')
        <div class="container">
            <h1 class="text-center my-4">About</h1>
            <div class="card fs-5">
                <p class="fs-4">Hello my name is Marta Tirkovska and this website was made as my university qualification work!</p>
                    <p>In this website you can:</p>
                <ul>
                    <li>Plan your budget in <a class="text-decoration-none" href="/finances">finances</a> page</li>
                    <li>Set your <a class="text-decoration-none" href="/goals">goals</a> and follow the progress of them</li>
                    <li>Write and read posts in our community <a class="text-decoration-none" href="/blog">blog</a></li>
                </ul>
            </div>
            <h1 class="text-center my-4">Contact us</h1>
            <div class="card fs-5">
                <p class="fs-4">If there is any questions or suggestions feel free to contact us: <a  class="text-decoration-none" href="mailto:personal.finances.blog@gmail.com">personal.finances.blog@gmail.com</a></p>
            </div>
        </div>
    @endsection
