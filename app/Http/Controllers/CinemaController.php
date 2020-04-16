<?php

namespace App\Http\Controllers;

use App\Cinema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CinemaController extends Controller
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
        $cinemas = new Cinema();
        return view('layouts.cinemas.create', compact('cinemas'));
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
            'name'=>'required',
            'telephone'=>'required',
            'address'=>'required',
            'seat_limit'=>'required',
            'photo'=>'required'

        ]);
        $cinema = new Cinema();
        $cinema->name = $request['name'];
        $cinema->telephone = $request['telephone'];
        $cinema->address = $request['address'];
        $cinema->seat_limit = $request['seat_limit'];
        $cinema->photo = $request['photo'];
        $cinema->save();
        if($request->file('photo'))
        {
            $path = Storage::disk('public')->put('cinema house photos', $request->file('photo'));
            $cinema->fill(['photo'=>asset($path)])->save();
        }
        return back()->withSuccess('Successfully created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cinema $cinema)
    {
        return view('layouts.cinemas.show',compact('cinema'));
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
