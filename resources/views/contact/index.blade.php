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
                        <h2>All Data</h2>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('contact.create') }}"> Create Contact Details</a>
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table table-bordered shadow text-center table-striped table-hover ">
                    <tr>
                        <th>Name</th>
                        <!-- <th>DOB</th> -->
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Account related To </th>
                        <th>Project Assigned from: </th>
                        <!-- <th>Gender</th> -->
                        <!-- <th>Country</th> -->
                        <th width="280px">Action</th>
                    </tr>         
                    @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->f_name }}</td>
                    <!-- <td>{{ $contact->dob }}</td> -->
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->email }}</td>
                    
                   <td> @foreach ($contact->account as $f_name)
                            <strong> 
                            {{$f_name->f_name}} {{$f_name->l_name}}</strong>
                        @endforeach 
                   </td>
                   <td> @foreach ($contact->projects as $f_name)
                        <strong> 
                            {{$f_name->f_name}}</strong>
                        @endforeach 
                    </td>

                    <!-- <td>{{ $contact->hobby }}</td> -->
                    <!-- <td>{{ $contact->gender }}</td> -->
                    <!-- <td>{{ $contact->country }}</td> -->
                    <td>
                        <form action="{{ route('contact.destroy',$contact->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('contact.show',$contact->id) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('contact.edit',$contact->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach</tr>
        
        </table>
@endsection
   