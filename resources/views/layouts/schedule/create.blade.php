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
                Create Schedule
                </div>

                <div class="card-body">




                  <form method="POST" action="/admin/schedule/post" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.schedule.form')

                    <input type="submit" class="btn btn-success" value="Post">
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">

            <div class="card mb-2">
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
                   <p>schedule not found</p>
                   @endif
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-6">
                            All Characters
                        </div>
                        <div class="col-sm-6" align="right">
                            @if(auth()->user()->is_admin == 1)
                            <a href="" data-toggle="modal" data-target="#myModal"> New</a>
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                  <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4 class="modal-title">Add new character</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body" align="left">
                                      <form action="/character/post" method="POST">
                                        @csrf
                                        <div class="form-group">

                                            <input name="full_name" type="text" class="form-control" placeholder="full name">
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="post" class="btn btn-success">
                                        </div>
                                    </form>
                                    </div>

                                    <!-- Modal footer -->


                                  </div>
                                </div>
                              </div>

                            @endif
                        </div>
                    </div>


                </div>
                <div class="card-body">
                   <ul>
                       @if($characters->count() > 0)
                    @foreach ($characters as $character)
                    <li>{{ $character->full_name }}</li>

                    @endforeach
                    @else
                    <p>character not found</p>
                    @endif
                   </ul>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
