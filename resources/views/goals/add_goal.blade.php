@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Add goal')
    @section('content')
        <form method="POST" action="/goals">
            @csrf <!--if one website pretends to be other website -->
            <div class="container">
                <div class="mb-3">
                    <h1 class="my-5">{{ __('Add goal') }}</h1>
                    <input type="text" placeholder="Goal..." class="form-control col-sm col-form-label @error('goal') text-danger @enderror" 
                    name="goal" required>
                    @error('goal')
                    <p class="text-danger">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-3">
                    <textarea class="form-control" name="description" placeholder="Description..."></textarea>  
                </div>
                <label for="finish">Due date: </label>
                <input type="date" id="finish" name="finish_date">
                @error('finish_date')
                <p class="text-danger">
                    {{ $message }}
                </p>
                    @enderror
                <div class="form-check my-3">
                    <input name="done" class="form-check-input" type="checkbox" value="" id="flexCheckDefault" {{ old('done') ? 'checked="checked"' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                    <b>It's done</b>
                    </label>
                </div>
                <button class="d-grid gap-2 col-3 mx-auto text-wrap w-25" type="submit">{{ __('Add') }}</button>
            </div>
        </form>
    @endsection