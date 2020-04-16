@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            Cinemas
                        </div>
                        <div class="col-sm-6" align="right">
                            @if(auth()->user()->is_admin == 1)
                            <a href="/admin/cinemas/create"> New</a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if($cinemas->count() > 0)
                    <div class="row">
                    @foreach($cinemas as $cinema)


                         <div class="col-sm-4">
                             <div class="card">


                             <div class="card-img">

                            <img src="{{ $cinema->photo }}" class="img-thumbnail">
                             </div>
                             <div class="card-body">
                                <h5> <a href="/cinemas/{{ $cinema->id}}"> {{ $cinema->name  }}</a> </h5>

                             </div>
                             </div>
                         </div>
                        @endforeach
                    </div>
                    @else
                    <p>Cinema Not found</p>
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
                    @if($schedules->count() > 0 )
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


        </div>
    </div>
</div>
@endsection
