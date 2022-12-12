@extends('layouts.layout')
@section('content')
    <x-button-create link="{{route('users.create')}}">Create user</x-button-create>
    <div class="card">
        <div class="card-header">
            Users list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Position</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="5">Add a user</td>
                    </tr>
                @else
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>@if($user->is_admin) Yes @else No @endif</td>
                    <td>{{$user->position}}</td>
                    <td>
                        <x-button-edit link="{{route('users.edit', $user->id)}}"/>
                        <x-button-delete link="{{route('users.destroy', $user->id)}}"/>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
@endsection
