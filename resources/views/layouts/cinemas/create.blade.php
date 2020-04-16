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
                <h3> <i class="fas fa-plus"></i> Create Cinema</h3>
                </div>

                <div class="card-body">

                  <form method="POST" action="/admin/cinemas/post" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.cinemas.form')

                    <input type="submit" class="btn btn-success" value="Post">
                    </form>

                </div>
                <a href="/home" class="btn btn-primary mt-3">Back</a>
            </div>
        </div>
    </div>
</div>
@endsection
