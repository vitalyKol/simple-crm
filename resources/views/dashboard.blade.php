@extends('layouts.layout')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Create user
                    </div>
                    <div class="card-body text-center">
                        <i class="fa fa-user fa-6x" aria-hidden="true"></i><br>
                        <a href="{{route('users.create')}}">
                            <button class="btn btn-success mt-2 mb-2">Create user</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Create client
                    </div>
                    <div class="card-body text-center">
                        <i class="fa fa-address-card fa-6x" aria-hidden="true"></i><br>
                        <a href="{{route('clients.create')}}">
                            <button class="btn btn-success mt-2 mb-2">Create client</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Create project
                    </div>
                    <div class="card-body text-center">
                        <i class="fa fa-folder-open fa-6x" aria-hidden="true"></i><br>
                        <a href="{{route('projects.create')}}">\
                            <button class="btn btn-success mt-2 mb-2">Create project</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Create task
                    </div>
                    <div class="card-body text-center">
                        <i class="fa fa-tasks fa-6x" aria-hidden="true"></i><br>
                        <a href="{{route('tasks.create')}}">
                            <button class="btn btn-success mt-2 mb-2">Create task</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
