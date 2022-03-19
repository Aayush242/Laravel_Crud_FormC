@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Profile Details</h2>
                    </div>
                </div>
            </div>
        
            <br>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            {!!Form::model($user,['route' => ['profile.show' , $user->id] ] , ['method'=>'POST' , 'enctype'=>'multipart/form-data'])!!}
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name: {{$user->name}}</strong>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email: {{$user->email}}</strong>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Password: {{$user->password}}</strong>
                    </div>
                </div>
            </div>
            <br>
        </form>
        <form action="{{ route('profile.destroy',$user->id) }}" method="Post">
            <a class="btn btn-warning" href="{{ route('profile.edit',$user->id) }}">Edit</a>
            
            @csrf
            @method('DELETE')
            <button type="submit"  class="btn btn-danger">Delete</button>
            
        </form>
                       
@endsection
   