@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Update post')
    @section('content')
        <form class="form" method="POST" action="/blog/{{ $post->slug }}" >
            @csrf <!--if one website pretends to be other website -->
            @method('PUT')<!-- transform POST method to PUT method-->

            <div class="container">
                <div class="mt-2 mb-5">
                    <h1>{{ __('Update post') }}</h1>
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ $post->title }}" class="form-control col-sm col-form-label @error('title') text-danger @enderror" 
                    name="title" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="body" 
                    placeholder="Body..." required>{{ $post->body }}</textarea> <!-- can't have value tag-->
                </div>
                <button class="d-grid gap-2 col-3 mx-auto" type="submit">{{ __('Submit') }}</button>
            </div>
        </form>
    @endsection