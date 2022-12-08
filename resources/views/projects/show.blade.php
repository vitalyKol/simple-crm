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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="mt-3" action="{{route('comments.store')}}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{$project->user->id}}">
                <input type="hidden" name="commentable_id" value="{{$project->id}}">
                <input type="hidden" name="commentable_type" value="App\Models\Project">
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment</label>
                    <textarea class="form-control" id="comment" rows="3" name="body"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Send">
                </div>
            </form>
        </div>
    </div>

@endsection
