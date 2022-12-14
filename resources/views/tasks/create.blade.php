@extends('layouts.layout')
@section('content')

    <div class="card mt-3">
        <div class="card-header">
            Create task
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
            <form action="{{route('tasks.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Do something" value = "{{old('title')}}">
                </div>
                <div class="mb-3">
                    <x-select-status value="{{old('status')[0]??1}}" />
                </div>
                <div class="mb-3">
                    <label for="deadline" class="form-label">Deadline</label>
                    <input type="date" class="form-control" id="deadline" name="deadline" value = "{{old('deadline')}}" >
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
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>

@endsection
