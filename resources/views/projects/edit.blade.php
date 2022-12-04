@extends('layouts.layout')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Create project
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('projects.update', $project->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Do something" value="{{$project->title}}">
                </div>
                <div class="mb-3">
                    <label for="clients_id" class="form-label">Assigned client</label>
                    <select class="form-select" id="clients_id" name="clients_id[]">
                        @foreach($clients as $client)
                            @if($client->id === $project->clients_id)
                                <option value="{{$client->id}}" selected>{{$client->company}}</option>
                                @continue
                            @endif
                            <option value="{{$client->id}}">{{$client->company}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Assigned user</label>
                    <select class="form-select" id="user_id" name="user_id[]">
                        @foreach($users as $user)
                            @if($user->id === $project->user_id)
                                <option value="{{$user->id}}" selected>{{$user->first_name}}</option>
                                @continue
                            @endif
                            <option value="{{$user->id}}">{{$user->first_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price $</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="9999" value="{{$project->price}}">
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="{{$project->deadline}}">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>

@endsection
