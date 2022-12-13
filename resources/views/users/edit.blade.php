@extends('layouts.layout')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Edit user
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
            <form action="{{route('users.update', $user->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Mark" value = "{{$user->name}}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="email@google.com" value = "{{$user->email}}">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="is_admin[]" id="role">
                        @if($user->is_admin)
                            <option value="1" selected>Admin</option>
                            <option value="0">User</option>
                        @else
                            <option value="1">Admin</option>
                            <option value="0" selected>User</option>
                        @endif
                    </select>
                </div>
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position" name="position" placeholder="CEO" value = "{{$user->position}}">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>

@endsection
