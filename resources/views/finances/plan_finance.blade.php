@extends('/layouts/main') <!-- code what is repeatable we are just copying from main.blade.php-->
@section('title', '| Plan budget')
    @section('content')
        <form method="POST" action="/finances">
            @csrf <!--if one website pretends to be other website -->
            <div class="container">
                <div class="mb-3">
                    <h1 class="my-5">{{ __('Plan your budget') }}</h1>
                    <div class="input-group mt-3">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Year</button>
                        </div>
                        <select name="year" class="custom-select @error('year') text-danger @enderror" required>
                            <option value="" selected>Choose...</option>
                            <option name="year" value="2022">2022</option>
                            <option name="year" value="2023">2023</option>
                            <option name="year" value="2024">2024</option>
                            <option name="year" value="2025">2025</option>
                            <option name="year" value="2026">2026</option>
                            <option name="year" value="2027">2027</option>
                            <option name="year" value="2028">2028</option>
                            <option name="year" value="2029">2029</option>
                            @error('year')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </select>
                    </div>
                </div>

                    <div class="input-group my-4">
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button">Month</button>
                        </div>
                        <select name="month_id" class="custom-select @error('month_id') text-danger @enderror" required>
                            <option value="" selected>Choose...</option>
                            <option name="month_id" value="1">January</option>
                            <option name="month_id" value="2">February</option>
                            <option name="month_id" value="3">March</option>
                            <option name="month_id" value="4">April</option>
                            <option name="month_id" value="5">May</option>
                            <option name="month_id" value="6">June</option>
                            <option name="month_id" value="7">July</option>
                            <option name="month_id" value="8">August</option>
                            <option name="month_id" value="9">September</option>
                            <option name="month_id" value="10">October</option>
                            <option name="month_id" value="11">November</option>
                            <option name="month_id" value="12">December</option>
                            @error('month_id')
                            <p class="text-danger">
                                {{ $message }}
                            </p>
                            @enderror
                        </select>
                    </div>
                <div class="row">
                    <form>
                        <div class="table-responsive">
                            <table class="table table-m table-borderless">
                                <tr class="mb-2">    
                                    <th class="align-middle text-center"><h5>Your income :</h5></th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="income" /></td>    
                                </tr>
                                <tr>    
                                    <th class="align-middle text-center">Housing :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="housing" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Transportation :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="transportation" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Food :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="food" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Utilities :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="utilities" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Clothing :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="clothing" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Healthcare :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="healthcare" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Insurance :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="insurance" /></td>    
                                </tr>
                                <tr>    
                                    <th class="align-middle text-center">Household Supplies :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="household_supplies" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Personal :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="personal" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Debt :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="debt" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Retirement :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="retirement" /></td>    
                                </tr>
                                <tr>    
                                    <th class="align-middle text-center">Education :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="education" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Savings :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="savings" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Gifts :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="gifts" /></td>    
                                </tr> 
                                <tr>    
                                    <th class="align-middle text-center">Entertainment :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="entertainment" /></td>    
                                </tr>
                                <tr>    
                                    <th class="align-middle text-center">Unexpected :</th>    
                                    <td><input type="number" step="0.01" min="0" class="text-center" name="unexpected" /></td>    
                                </tr> 
                            </table>
                        </div>
                    </form>
                </div>
                <button class="d-grid gap-2 col-3 mx-auto text-wrap w-25" type="submit">{{ __('Add') }}</button>
            </div>
        </form>
    @endsection