@extends('layouts.layout')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Edit task
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
            <form action="{{route('tasks.update', $task->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Do something" value="{{$task->title}}">
                </div>
                <div class="mb-3">
                    <x-select-status value="{{$task->status}}" />
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value="{{$task->deadline}}">
                </div>
                <div class="mb-3">
                    <label for="assigned" class="form-label">Assigned user</label>
                    <select class="form-select" id="assigned" name="user_id[]">
                        @foreach($users as $user)
                            @if($user->id === $task->user_id)
                                <option value="{{$user->id}}" selected>{{$user->first_name}}</option>
                                @continue
                            @endif
                            <option value="{{$user->id}}">{{$user->first_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>

@endsection
