@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                           {{ $schedule->cinema['name'] }} Reservations
                        </div>
                        <div class="col-sm-6" align="right">
                            <a href="/home"> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if($schedule->reservations->count() >0)
                    <form action="/reservation/search" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">

                                    <input type="text" class="form-control" name="mobilenumber" placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">search</button>
                                </div>
                            </div>
                        </div>


                    </form>


                <table class="table table-striped">
                    <thead>
                        <th>Full Name</th>
                        <th>Payment Date</th>
                        <th>Mobile Number</th>
                        <th>Ticket Number</th>
                        <th>Seat Code</th>
                        <th>Regestered at</th>
                    </thead>
                    <tbody>
                        @foreach($schedule->reservations as $reserved)
                        <tr>
                            <td>{{ $reserved->first_name }} {{ $reserved->last_name }}</td>

                            <td>{{ $reserved->payment_date }}</td>
                            <td>{{ $reserved->mobile_number }}</td>
                            <td>{{ $reserved->ticket_number }}</td>
                            <td>{{ $reserved->seat_code }}</td>
                            <td>{{ $reserved->created_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Reservation not found</p>
                @endif
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                           All Schedule
                        </div>
                        <div class="col-sm-6" align="right">
                            @if(auth()->user()->is_admin == 1)
                            <a href="/admin/schedule/create"> New</a>
                            @endif
                        </div>
                    </div>


                </div>
                <div class="card-body">
                   <ul>
                    @foreach($cinemas as $cinema)
                    @if($cinema->schedules()->count() > 0 )
                    <li>
                        <a href="/cinemas/{{ $cinema->id }}">
                     {{ $cinema->name }} &nbsp; <span class="badge badge-success"> {{ $cinema->schedules()->count() }}</span>
                        </a>
                    </li>
                    @endif
                    @endforeach
                   </ul>
                </div>
            </div>

            <div class="card mb-4 mt-2">
                <div class="card-img"><img src="{{ $schedule->album }}" width="100%" height="200px" class="img-rounded mb-2" /></div>
            <div class="card-body">
                <p>Movie Title: {{ $schedule->movie_title }}</button> </p>
                <p>Show date: {{ $schedule->show_date }}</a> </p>
                <p>Show start: at {{ $schedule->show_time }}</a> </p>
                <hr>
                <p>
                characters
                </p>
                @foreach($schedule->characters as $character)
                <kbd>  {{ $character->full_name }}</kbd>

                @endforeach
            </div>
            </div>

            <div class="card mt-3">
                <div class="card-img">
                    <img src="{{$cinema->photo }}" class="img-rounded mb-3" width="280" height="200"/>

                </div>
                <div class="card-body">

                     <h3>{{ $cinema->name }}</h3>

                       <p>Seat Limt: {{ $cinema->seat_limit }}</p>
                        </div>

                            <div class="card-footer">
                                <p>Total Reserved: {{ $schedule->reservations()->count() }}</p>

                        </div>
            </div>
        </div>
    </div>
</div>
@endsection
