@extends('layouts.main')

@section('content')
 <!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments</h1>
</div>

<div class="row">
    <div class="card mx-auto">
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
                    <form action="{{ route('departments.index') }}" method="get">
                        <div class="form-row align-items-center">
                            <div class="col">
                                <input type="search" name="search" class="form-contrl mb-2" id="" placeholder="search">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>

                    <a href="{{route('departments.create')}}" class="btn btn-primary float-right">Create</a>
                </div>

            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Department</th>
                        <th>Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $department)
                        <tr>
                            <th>{{$department->id}}</th>
                            <td>{{$department->name}}</td>
                            <td>
                                <a href="{{ route('departments.edit', $department->id)}}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
