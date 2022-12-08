@extends('layouts.layout')

@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Comments list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Body</th>
                    <th scope="col">Assigned user</th>
                    <th scope="col">Assigned type</th>
                    <th scope="col">Assigned id of type</th>
                    <th scope="col">Created</th>
                </tr>
                </thead>
                <tbody>
                @if($comments->isEmpty())
                    <tr>
                        <td colspan="5">Add any comments</td>
                    </tr>
                @else
                @foreach($comments as $comment)
                <tr>
                    <th scope="row">{{$comment->id}}</th>
                    <td>{{$comment->body}}</td>
                    @foreach($users as $user)
                        @if($user->id == $comment->user_id)
                            <td>{{$user->first_name}}</td>
                        @endif
                    @endforeach
                    <td>{{substr(strrchr($comment->commentable_type, '\\'),1)}}
                    </td>
                    <td>{{$comment->commentable_id}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td>
                        <x-button-edit link="{{route('comments.edit', $comment->id)}}"/>
                        <x-button-delete link="{{route('comments.destroy', [$comment->id])}}"/>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            {{$comments->links()}}
        </div>
    </div>
@endsection
