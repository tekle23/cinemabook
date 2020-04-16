@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            {{ $cinema->name }}
                        </div>
                        <div class="col-sm-6" align="right">
                            <a href="/home"> Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6">
                            <img src="{{ $cinema->photo }}" class="img-rounded" width="300" height="150"/>
                        </div>
                        <div class="col-lg-6">

                            <p>Telephone: {{ $cinema->telephone }}</a> </p>
                            <p>Address: {{ $cinema->address }}</a> </p>
                            <p>Seat Limit: {{ $cinema->seat_limit }}</a> </p>
                            <p>Created at: {{ $cinema->created_at->diffForHumans() }}</a> </p>
                        </div>
                    </div>



                </div>
                <div class="card-footer">
                   <a href="/schedule/{{ $cinema->id }}">See Schedules</a>
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
                    @if($cinema->schedules()->count() > 0 )
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
                   <p>schedule not found</p>
                   @endif
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
