@extends('layouts.layout')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Task {{$task->id}}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Title: {{$task->title}}</li>
                <li class="list-group-item">Status: {{$options[$task->status]}}</li>
                <li class="list-group-item">Assigned user: {{$task->user->first_name}}</li>
                <li class="list-group-item">Deadline: {{$task->deadline}}</li>
            </ul>
            <form class="mt-3" action="{{route('projects.update', $task->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Send">
                </div>

            </form>
        </div>
    </div>

@endsection
