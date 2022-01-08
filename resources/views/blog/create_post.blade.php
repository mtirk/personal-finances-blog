@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Create a post')
    @section('content')
        <form method="POST" action="/blog" 
        enctype="multipart/form-data"> <!-- to let the application know that we are going to upload a file-->
            @csrf <!--if one website pretends to be other website -->
            <div class="container">
                <div class="mb-3">
                    <h1>{{ __('Create a post') }}</h1>
                    <input type="text" placeholder="Title..." class="form-control col-sm col-form-label @error('title') text-danger @enderror" 
                    name="title" required>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="body" placeholder="Body..." required></textarea>
                </div>

                <label class="file mb-3">
                    <span class="p-2">
                        Select a file
                    </span>
                    <input type="file" name="image" class="hidden" required>
                    @error('image')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </label>
                <button class="d-grid gap-2 col-3 mx-auto text-wrap w-25" type="submit">{{ __('Create') }}</button>
            </div>
        </form>
    @endsection