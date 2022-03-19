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
                        <a class="btn btn-success" href="{{ route('project.create') }}"> Create Project Details</a>
                    </div>
                </div>
            </div>
        
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
                <table class="table table-bordered shadow text-center table-striped">
                    <tr>
                        <th>Name</th>
                    <!--<th>DOB</th> -->
                        <th>Email</th>
                        <th>Assigning Date</th>
                        <th>Deadline</th>
                        <th width="280px">Action</th>
                    </tr>         
                    @foreach ($projects as $project)
                <tr>
                    <td>{{ $project->f_name }}</td>
                    <td>{{ $project->email }}</td>
                    <td>{{ $project->as_date }}</td>
                    <td>{{ $project->deadline }}</td>
                    <td>
                        <form action="{{ route('project.destroy',$project->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('project.show',$project->id) }}">Show</a>
                            <a class="btn btn-warning" href="{{ route('project.edit',$project->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach</tr>
        
        </table>
@endsection
   