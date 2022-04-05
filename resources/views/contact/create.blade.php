@extends('layouts.app')
@section('content')
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left mb-2">
                        <h2>Add Contact Details</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('contact.index') }}">Show all Records</a>
                    </div>
                </div>
            </div>
        
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <!-- <form action="{{ route('contact.store') }}" method="POST" enctype="multipart/form-data"> -->
                {!!Form::open(['route' => 'contact.store'] , ['method'=>'POST' , 'enctype'=>'multipart/form-data'])!!}
                @csrf
                @include('contact.form')
                <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                    <div class="d-none">
                    <select name="abc" ><option value="null">None</option></select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                    <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->            
                    {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
                </div>
                {!! Form::close() !!}
            <!-- </form> -->
@endsection