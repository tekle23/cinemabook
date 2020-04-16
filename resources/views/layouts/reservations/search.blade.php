@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            Reservations
                        </div>
                        <div class="col-sm-6" align="right">
                            <a href="/home"> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

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

                        <tr>
                            <td>{{ $search->first_name }} {{ $search->last_name }}</td>

                            <td>{{ $search->payment_date }}</td>
                            <td>{{ $search->mobile_number }}</td>
                            <td>{{ $search->ticket_number }}</td>
                            <td>{{ $search->seat_code }}</td>
                            <td>{{ $search->created_at->diffForHumans() }}</td>
                        </tr>

                    </tbody>
                </table>

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
                <div class="card-img"><img src="{{ $search->schedule->album }}" class="img-thumbnail mb-2" /></div>
            <div class="card-body">
                <p>Movie Title: {{ $search->schedule->movie_title }}</button> </p>
                <p>Show date: {{ $search->schedule->show_date }}</a> </p>
                <p>Show start: at {{ $search->schedule->show_time }}</a> </p>
                characters
            </p>
            @foreach($search->schedule->characters as $character)
            <kbd>  {{ $character->full_name }}</kbd>

            @endforeach

            </div>
            </div>

            <div class="card mt-3">
                <div class="card-footer">
                    {{ $search->schedule->cinema['name'] }}
                </div>
                <div class="card-body">

                        <img src="{{$search->schedule->cinema['photo'] }}" class="img-rounded mb-3" width="280" height="200"/>

                       <p>Seat Limt: {{$search->schedule->cinema['seat_limit'] }}</p>
                        </div>

                            <div class="card-footer">
                                <p>Total Reserved: {{ $search->schedule->count() }}</p>

                        </div>
            </div>

        </div>
    </div>
</div>
@endsection
