@extends('layouts.layout')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
           Project {{$project->id}}
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Title: {{$project->title}}</li>
                <li class="list-group-item">Assigned client: {{$project->client->company}}</li>
                <li class="list-group-item">Assigned user: {{$project->user->first_name}}</li>
                <li class="list-group-item">Price $: {{$project->price}}</li>
                <li class="list-group-item">Deadline: {{$project->deadline}}</li>
            </ul>
            <form class="mt-3" action="{{route('projects.update', $project->id)}}" method="post">
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
