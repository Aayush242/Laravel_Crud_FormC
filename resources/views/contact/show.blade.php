@extends('layouts.app')
@section('content')
<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Details</h2>
                        <a class="btn btn-primary" href="{{ route('contact.index') }}">Back</a>
                    </div>
                    <div class="pull-right">
                        <!-- <a class="btn btn-primary" href="{{ route('contact.index') }}" enctype="multipart/form-data">Show all records</a> -->
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
           
            {!!Form::model($contact,['route' => ['contact.update' , $contact->id] ] , ['method'=>'POST' , 'enctype'=>'multipart/form-data'])!!}
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name: {{$contact->f_name}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Phone No.: {{$contact->phone}}</strong>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email: {{$contact->email}}</strong>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <br>
                            @foreach ($contact->account as $l_name)
                            <strong> Last name: 
                                {{$l_name->l_name}}</strong>
                            @endforeach 
                        </div>
                    </div>

                </div>
            </form>
            <form action="{{ route('contact.destroy',$contact->id) }}" method="Post">
                <br>
                    
                            <a class="btn btn-warning" href="{{ route('contact.edit',$contact->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
             </form>
                  
        </div>
@endsection