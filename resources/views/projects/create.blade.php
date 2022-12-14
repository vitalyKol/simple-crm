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
            <form action="{{route('projects.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Some project" value = "{{old('title')}}">
                </div>
                <div class="mb-3">
                    <label for="clients_id" class="form-label">Assigned client</label>
                    <select class="form-select" id="clients_id" name="clients_id[]">
                        @foreach($clients as $client)
                            <option value="{{$client->id}}">{{$client->company}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="user_id" class="form-label">Assigned user</label>
                    <select class="form-select" id="user_id" name="user_id[]">
                        @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price $</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="9999" value = "{{old('number')}}">
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value = "{{old('activity')}}">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>

@endsection
