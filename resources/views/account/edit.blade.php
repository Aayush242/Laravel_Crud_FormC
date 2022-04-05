@extends('layouts.app')
@section('content')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Account Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('account.index') }}" enctype="multipart/form-data"> Back</a>
            </div>
        </div>
    </div>
    
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif
           
    {!!Form::model($account,['route' => ['account.update' , $account->id] ] , ['method'=>'POST' , 'enctype'=>'multipart/form-data'])!!}

        @csrf
        @method('PUT')
        @include('account.form_c')
                
        @php
            $contactr = DB::table('account_contact')->select('contact_id')->where('account_id',$account->id)->get();
        @endphp

        <div class="form-group">
            <label for="exampleFormControlSelect1">Detach Realtion with: </label>
            <div class="col-sm-5">
                <select name="relation_with"> 
                    <option value="null">None</option>
                    @foreach ($contactr as $contact )
                    @php
                         $contacta = DB::table('contacts')->select('f_name')->where('id',$contact->contact_id)->get();
                    @endphp
                        <option value="{{$contact->contact_id}}">{{$contacta}}</option>
                    @endforeach
                </select>
            </div>
        </div>
                         
    <div class="col-xs-12 col-sm-12 col-md-12 my-2">
        <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->            
        {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
    </div>
    {!! Form::close() !!}
</div>

@endsection