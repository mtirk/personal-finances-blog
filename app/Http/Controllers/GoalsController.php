<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goal;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon;

class GoalsController extends Controller
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
        return view('goals\goals')
            ->with('goals', Goal::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('goals\add_goal');
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
            'goal' => 'required',
            'finish_date' => 'required',
        ]);

        Goal::create([
            'goal' => $request->input('goal'),
            'description' => $request->input('description'),
            'done' => $request->has('done'),
            'slug' => SlugService::createSlug(Goal::class, 'slug', 
            $request->goal),
            'finish_date' => $request->input('finish_date'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('goals')->with('message', 'Your goal has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('goals\edit_goal')
            ->with('goal', Goal::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'goal' => 'required',
            'finish_date' => 'required',
        ]);

        Goal::where('slug', $slug)
            ->update([
            'goal' => $request->input('goal'),
            'description' => $request->input('description'),
            'done' => $request->has('done'),
            'slug' => SlugService::createSlug(Goal::class, 'slug', 
            $request->goal),
            'finish_date' => $request->input('finish_date'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('goals')->with('message', 'Your goal has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $goal = Goal::where('slug', $slug);
        $goal->delete();

        return redirect('/goals')
        ->with('message', 'Your goal has been deleted!');
    }
}
