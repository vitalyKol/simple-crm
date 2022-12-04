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
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->position}}</td>
                    <td>
                        <x-button-edit link="{{route('users.edit', $user->id)}}"/>
                        <x-button-delete link="{{route('users.destroy', $user->id)}}"/>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
