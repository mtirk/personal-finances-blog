<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Finance;
use DB;

class FinancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('finances\finances')
            ->with('finances', Finance::orderBy('month_id', 'ASC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('finances\plan_finance');
           
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'month_id' => 'required',
            'year' => 'required'
        ]);

        Finance::create([
            'housing' => $request->input('housing'),
            'income' => $request->input('income'),
            'transportation' => $request->input('transportation'),
            'food' => $request->input('food'),
            'utilities' => $request->input('utilities'),
            'clothing' => $request->input('clothing'),
            'healthcare' => $request->input('healthcare'),
            'insurance' => $request->input('insurance'),
            'household_supplies' => $request->input('household_supplies'),
            'personal' => $request->input('personal'),
            'debt' => $request->input('debt'),
            'retirement' => $request->input('retirement'),
            'education' => $request->input('education'),
            'savings' => $request->input('savings'),
            'gifts' => $request->input('gifts'),
            'entertainment' => $request->input('entertainment'),
            'unexpected' => $request->input('unexpected'),
            'year' => $request->input('year'),
            'month_id' => $request->input('month_id'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('finances')->with('message', 'Your budget has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('finances')
           ->select(
            DB::raw('housing as housing'),
            DB::raw('transportation as transportation'),
            DB::raw('food as food'),
            DB::raw('utilities as utilities'),
            DB::raw('clothing as clothing'),
            DB::raw('healthcare as healthcare'),
            DB::raw('insurance as insurance'),
            DB::raw('household_supplies as household_supplies'),
            DB::raw('personal as personal'),
            DB::raw('debt as debt'),
            DB::raw('retirement as retirement'),
            DB::raw('education as education'),
            DB::raw('savings as savings'),
            DB::raw('gifts as gifts'),
            DB::raw('entertainment as entertainment'),
            DB::raw('unexpected as unexpected'));
        $array[] = ['Name', 'Value'];
        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->name, $value->value];
        }        
        return view('finances\show_finance')
            ->with('finance', json_encode($array));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('finances\edit_finance')
            ->with('finance', Finance::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'year' => 'required',
            'month_id' => 'required'
        ]);

        Finance::where('id', $id)
            ->update([
            'housing' => $request->input('housing'),
            'income' => $request->input('income'),
            'transportation' => $request->input('transportation'),
            'food' => $request->input('food'),
            'utilities' => $request->input('utilities'),
            'clothing' => $request->input('clothing'),
            'healthcare' => $request->input('healthcare'),
            'insurance' => $request->input('insurance'),
            'household_supplies' => $request->input('household_supplies'),
            'personal' => $request->input('personal'),
            'debt' => $request->input('debt'),
            'retirement' => $request->input('retirement'),
            'education' => $request->input('education'),
            'savings' => $request->input('savings'),
            'gifts' => $request->input('gifts'),
            'entertainment' => $request->input('entertainment'),
            'unexpected' => $request->input('unexpected'),
            'year' => $request->input('year'),
            'month_id' => $request->input('month_id'),
            'user_id' => auth()->user()->id
        ]);    

        return redirect('/finances')
            ->with('message', 'Your budget has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finance = Finance::where('id', $id);
        $finance->delete();

        return redirect('/finances')
        ->with('message', 'Your budget has been deleted!');
    }

    public function googlePieChart()
    {
        $data = DB::table('finances')
           ->select(
            DB::raw('housing as housing'),
            DB::raw('transportation as transportation'),
            DB::raw('food as food'),
            DB::raw('utilities as utilities'),
            DB::raw('clothing as clothing'),
            DB::raw('healthcare as healthcare'),
            DB::raw('insurance as insurance'),
            DB::raw('household_supplies as household_supplies'),
            DB::raw('personal as personal'),
            DB::raw('debt as debt'),
            DB::raw('retirement as retirement'),
            DB::raw('education as education'),
            DB::raw('savings as savings'),
            DB::raw('gifts as gifts'),
            DB::raw('entertainment as entertainment'),
            DB::raw('unexpected as unexpected'),
            DB::raw('count(*) as number'))
           ->groupBy('number')
           ->get();
        $array[] = ['Course', 'Number'];
        foreach($data as $key => $value)
        {
          $array[++$key] = [$value->course, $value->number];
        }
        return view('google-pie-chart')->with('course', json_encode($array));
    }
}
