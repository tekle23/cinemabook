@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Schedules</h4>
                        </div>
                        <div class="col-sm-6" align="right">
                            <a href="/home"> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">


                    @if($cinema->schedules()->count() > 0)
                        <div class="row">
                        @foreach ($cinemaschedules as $schedule)
                        <div class="col-lg-6">
                            <div class="card mb-4">
                                <div class="card-img"><img src="{{ $schedule->album }}" class="img-rounded mb-2" width="100%" height="200px" /></div>
                            <div class="card-body">
                                <p>Movie Title: {{ $schedule->movie_title }}</a> </p>
                                <p>Show date: {{ $schedule->show_date }}</a> </p>
                                <p>Show start: at {{ $schedule->show_time }}</a> </p>
                                <hr>
                                <p>characters:</p>
                                    @foreach($schedule->characters as $character)
                                    <span class="badge-info">{{ $character->full_name }}</span>
                                    @endforeach
                            </div>
                           <div class="card-footer">
                            <div class="row">
                                @if(auth()->user()->is_admin == 1)
                                <div class="col-sm-6">

                                    <a href="/reservation/{{ $schedule->id }}/create">Reserve now</a>

                                </div>
                                @endif
                                <div class="col-sm-6">
                                   <a href="/reservation/{{ $schedule->id }}/show"> view reserved</a>

                                </div>
                            </div>
                           </div>

                        </div>
                    </div>
                    @endforeach

                    </div>
                    @else
                    <p>schedule not found</p>
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
                    @if($cinema->schedules()->count() > 0)
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
                   @else
                   <p>Schedule not found</p>
                   @endif
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-img">
                    <img src="{{$cinema->photo }}" class="img-rounded mb-3" width="100%" height="200px"/>

                </div>
                <div class="card-body">

                  <h3>  {{ $cinema->name }}</h3>

                       <p>Seat Limt: {{ $cinema->seat_limit }}</p>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
