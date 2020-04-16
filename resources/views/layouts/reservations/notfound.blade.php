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


               <p>
                   Search result not found
               </p>

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




        </div>
    </div>
</div>
@endsection
