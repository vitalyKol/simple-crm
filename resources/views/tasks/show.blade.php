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
                <li class="list-group-item">Assigned user:
                    @if(isset($task->user->name))
                        {{$task->user->name}}
                    @else
                        Was deleted
                    @endif
                </li>
                <li class="list-group-item">Deadline: {{$task->deadline}}</li>
            </ul>
            <h6 class="mt-5">Comments:</h6>
            @if($task->comments->isEmpty())
                <p>No comments</p>
            @else
            @foreach($task->comments as $comment)
                <div class="card m-2">
                    <div class="card-body">
                        <h5 class="card-title">User: {{$comment->user_id}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$comment->created_at}}</h6>
                        <p>{{$comment->body}}</p>
                    </div>
                </div>

            @endforeach
            @endif
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
                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                <input type="hidden" name="commentable_id" value="{{$task->id}}">
                <input type="hidden" name="commentable_type" value="{{get_class($task)}}">
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
