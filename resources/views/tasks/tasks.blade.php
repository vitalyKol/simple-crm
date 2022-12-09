@extends('layouts.layout')
@section('content')
    <x-button-create link="{{route('tasks.create')}}">Create task</x-button-create>
    <div class="card">
        <div class="card-header">
            <h1 class="h4">Tasks list</h1>
            <form action="{{route('tasks.index')}}" method="GET" class="text-center">
                <h5 class="h5 mb-1">Filters:</h5>
                <div class="btn-group mb-2" role="group">
                    <input type="radio" class="btn-check" name="option" id="all_options" value="all" @if(!isset($_GET['option']) || $_GET['option'] == 'all') checked @endif>
                    <label class="btn btn-outline-primary" for="all_options">All</label>
                    @foreach($options as $key => $option)
                        <input type="radio" class="btn-check" name="option" id="{{$key}}" value="{{$key}}" @if(isset($_GET['option']) && $_GET['option'] == $key) checked @endif>
                        <label class="btn btn-outline-primary" for="{{$key}}">{{$option}}</label>
                    @endforeach
                    <input type="checkbox" class="btn-check" id="unexpired" name="unexpired" value="unexpired" @if(isset($_GET['unexpired'])) checked @endif>
                    <label class="btn btn-outline-primary" for="unexpired">Unexpired</label>
                    <input type="submit" class="btn btn-outline-secondary" value="find">
                </div>
            </form>
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
                @if($tasks->isEmpty())
                    <tr>
                        <td colspan="6">Add some tasks</td>
                    </tr>
                @else
                    @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->id}}</th>
                        <td><a href="{{route('tasks.show', $task->id)}}">{{$task->title}}</a></td>
                        <td>{{$options[$task->status]}}</td>
                        <td>{{$task->deadline}}</td>
                        <?php $flag = 0; ?>
                        @foreach($users as $user)
                            @if($user->id === $task->user_id)
                                <td>{{$user->first_name}}</td>
                                <?php $flag = 1; ?>
                            @endif
                        @endforeach
                        @if($flag === 0)
                            <td>Was deleted</td>
                        @endif
                        <td>
                            <x-button-edit link="{{route('tasks.edit', $task->id)}}"/>
                            <x-button-delete link="{{route('tasks.destroy', $task->id)}}"/>
                        </td>
                    </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            {{$tasks->links()}}
        </div>
    </div>
@endsection
