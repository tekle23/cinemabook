<?php

namespace App\Http\Controllers;

use App\Character;
use App\Cinema;
use App\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Schedules = new Schedule();
        $characters = Character::all();
        return view('layouts.schedule.create', compact('Schedules','characters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'movie_title'=>'required',
            'cinema_id'=>'required',
            'album'=>'required',
            'show_date'=>'required',
            'show_time'=>'required'


        ]);
        $schedule = new Schedule();
        $schedule->cinema_id = $request['cinema_id'];
        $schedule->movie_title = $request['movie_title'];
        $schedule->album = $request['album'];
        $schedule->show_date = $request['show_date'];

        $schedule->show_time = $request['show_time'];
        $schedule->save();
        $schedule->characters()->sync($request->characters);
        if($request->file('album'))
        {
            $path = Storage::disk('public')->put('movie album', $request->file('album'));
            $schedule->fill(['album'=>asset($path)])->save();
        }
        return back()->withSuccess('Successfully created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cinema_id)
    {
        $cinema = Cinema::where('id',$cinema_id)->first();
        $cinemaschedules = Schedule::where('cinema_id',$cinema_id)->get();

        return view('layouts.schedule.show',compact('cinemaschedules','cinema'));

        //return dd( $cinemaschedules);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
