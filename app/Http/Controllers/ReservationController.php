<?php

namespace App\Http\Controllers;

use App\Reservation;
use App\Schedule;
use Illuminate\Http\Request;

class ReservationController extends Controller
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
    public function create(Schedule $schedule)
    {
        $reservation = new Reservation();
        return view('layouts.reservations.create',compact('schedule','reservation'));
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
            'schedule_id'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'ticket_number'=>'required',
            'seat_code'=>'required',
            'mobile_number'=>'required',
            'payment_date'=>'required'


        ]);
        $reservation = new Reservation();
        $reservation->schedule_id = $request['schedule_id'];
        $reservation->first_name = $request['first_name'];
        $reservation->last_name = $request['last_name'];
        $reservation->ticket_number = $request['ticket_number'];
        $reservation->seat_code = $request['seat_code'];
        $reservation->mobile_number = $request['mobile_number'];
        $reservation->payment_date = $request['payment_date'];

        $reservation->save();

        return back()->withSuccess('Successfully reserverd');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        //$schedules = Schedule::where('id', $id)->get();
        //$reservations = Reservation::where('schedule_id',$schedule->id)->get();
        return view('layouts.reservations.show',compact('schedule'));
        //return dd($reservations);
    }

    public function search(Request $request){
        $mobile = $request['mobilenumber'];
        $search = Reservation::where('mobile_number',$mobile)->first();
        if($search){
        return view('layouts.reservations.search', compact('search'));
        }else{
            return view('layouts.reservations.notfound');
        }

        //dd($reserve);
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
    public function upload(Request $request)
    {

        $upload = $request->file('csv');
        if($upload){
        $filepath = $upload->getRealPath();
        $file = fopen($filepath,'r');
        $escapedHeader= [];
        $header = fgetcsv($file);
        //dd($header);
        foreach($header as $key=>$value){
            $lheader = strtolower($value);

            array_push($escapedHeader,$lheader);
        }

        while($columns=fgetcsv($file)){
            if($columns[0]==''){
                continue;
            }
            foreach($columns as $key => &$value){
                $value = $value;
            }
            $data = array_combine($escapedHeader, $columns);
            foreach($data as $key => &$value){
                $value = ($key=="schedule_id" ||$key=="first_name"
                ||$key=="last_name"||$key=="mobile_number"
                ||$key=="ticket_number"||$key=="seat_code"
                ||$key=="payment_date")?(string)$value: (integer)$value;
            }
            $schedule_id = $data['schedule_id'];
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $mobile_number = $data['mobile_number'];
            $ticket_number = $data['ticket_number'];
            $seat_code = $data['seat_code'];
            $payment_date = $data['payment_date'];

            $csvReserve = Reservation::firstOrNew(['schedule_id'=>$schedule_id,
            'first_name'=>$first_name, 'last_name'=>$last_name,
            'mobile_number'=>$mobile_number,'seat_code'=>$seat_code,
            'ticket_number'=>$ticket_number,'payment_date'=>$payment_date
            ]);
            $csvReserve->save();

            return back()->withSuccess('Successfully reserverd');


        }

    }else{
    return back();
}
 }
}
