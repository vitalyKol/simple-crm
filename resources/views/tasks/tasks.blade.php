@extends('layouts.layout')
@section('content')
    <x-button-create link="{{route('tasks.create')}}">Create task</x-button-create>
    <div class="card">
        <div class="card-header">
            Tasks list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Assigned user</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(!isset($tasks))
                    <tr>
                        <td colspan="6">Add some tasks</td>
                    </tr>
                @else
                    @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td>{{$task->title}}</td>
                        <td>{{$options[$task->status]}}</td>
                        <td>{{$task->deadline}}</td>
                        @foreach($users as $user)
                            @if($user->id === $task->user_id)
                                <td>{{$user->first_name}}</td>
                            @endif
                        @endforeach
                        <td>
                            <x-button-edit link="{{route('tasks.edit', $task->id)}}"/>
                            <x-button-delete link="{{route('tasks.destroy', $task->id)}}"/>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
