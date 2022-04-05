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

                @php
                  $accountr = DB::table('account_contact')->select('account_id')->where('contact_id',$contact->id)->get();
                @endphp
    

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Detach Realtion with: </label>
                    <div class="col-sm-5">
                        <select name="relation_with"> 
                            <option value="null">None</option>
                            @foreach ($accountr as $account )
                            @php
                                 $accounta = DB::table('accounts')->select('f_name')->where('id',$account->account_id)->get();
                            @endphp
                                <option value="{{$account->account_id}}">{{$accounta}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 my-2">
                    <!-- <button type="submit" class="btn btn-primary ml-3">Submit</button> -->            
                    {!!Form::submit('Submit' , ['class'=>'btn btn-primary ml-3']);!!}
                </div>
                {!! Form::close() !!}
            <!-- </form> -->
        </div>
@endsection