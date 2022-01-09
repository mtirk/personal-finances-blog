@extends('/layouts/main') <!-- kods, kas atkārtojas tiek saglabāts main.blade.php -->
@section('title', '| Update goal')
    @section('content')
    @if (isset(Auth::user()->id) && Auth::user()->id == $goal->user_id)
        <form class="form" method="POST" action="/goals/{{ $goal->slug }}" >
            @csrf <!--if one website pretends to be other website -->
            @method('PUT')<!-- transform POST method to PUT method-->
            <div class="container">
                <div class="mt-2 mb-5">
                    <h1>{{ __('Update goal') }}</h1>
                </div>
                <div class="mb-3">
                    <input type="text" value="{{ $goal->goal }}" class="form-control col-sm col-form-label @error('goal') text-danger @enderror" 
                    name="goal" required>
                </div>

                <div class="mb-3">
                    <textarea class="form-control" name="description" placeholder="Description...">{{ $goal->description }}</textarea> <!-- tiek ievietots jau datubāzē saglabātā vērtība --> 
                </div>

                <label for="finish">Due date: </label>
                <input type="date" value="{{ $goal->finish_date }}"id="finish" name="finish_date">

                <div class="form-check my-3">
                    <input name="done" class="form-check-input" type="checkbox" value="{{ $goal->done }}" id="flexCheckDefault" {{ old('done') ? 'checked="checked"' : '' }}>
                    <label class="form-check-label" for="flexCheckDefault">
                    <b>It's done</b>
                    </label>

                <button class="d-grid gap-2 col-3 mx-auto" type="submit">{{ __('Submit') }}</button>
            </div>
        </form>
    @endif
    @endsection
   