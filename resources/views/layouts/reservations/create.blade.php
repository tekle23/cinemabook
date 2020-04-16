@extends('layouts.app')
@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ $schedule->cinema['name'] }} {{ $schedule->movie_title }} reservation
                </div>


                <div class="card-body">
                    <div class="card p-3">
                        <h5>Option 1 </h5>
                        <form action="/reservation/upload/csv" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mt-3">
                                <div class="col-lg-8" align="center">
                                    <label for="csv">Select csv</label>


                                        <input type="file" name="csv">

                                </div>
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <input type="submit" value="post" class="btn btn-primary">
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                    <div class="card mt-3 p-3">


                    <h5>Option 2</h5>
                 <form method="POST" action="/admin/resevation/post">
                    @csrf
                    @include('layouts.reservations.form')

                    <input type="submit" class="btn btn-success" value="Post">
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-img"><img src="{{ $schedule->cinema['photo']}}" width="100%" height="200px" class="img-rounded mb-2" /></div>
            <div class="card-body">
                <p>name: {{ $schedule->cinema['name'] }}</a> </p>
                <p>seat limit: {{ $schedule->cinema['seat_limit'] }}</a> </p>
                <p>address:{{ $schedule->cinema['address'] }}</a> </p>
                <p>telephone: {{ $schedule->cinema['telephone'] }}</p>

            </div>
            <div class="card-footer">
                <p>Total Reserved: {{ $schedule->reservations()->count() }}</p>
            </div>
            </div>
            <div class="card mb-4">
                <div class="card-img"><img src="{{ $schedule->album }}" width="100%" height="200px" class="img-rounded mb-2" /></div>
            <div class="card-body">
                <p>Schedule ID: {{ $schedule->id }}</p>
                <p>Movie Title: {{ $schedule->movie_title }}</a> </p>
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


        </div>

    </div>
</div>
@endsection
