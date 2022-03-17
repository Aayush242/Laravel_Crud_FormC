@extends('layouts.app')
@section('content')

<div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit Contact Details</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('contact.index') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <!-- <form action="{{ route('contact.update',$contact->id) }}" method="POST" enctype="multipart/form-data"> -->
            {!!Form::model($contact,['route' => ['contact.update' , $contact->id] ] , ['method'=>'POST' , 'enctype'=>'multipart/form-data'])!!}

                @csrf
                @method('PUT')
                @include('contact.form')
                {!! Form::close() !!}
            <!-- </form> -->
        </div>
@endsection