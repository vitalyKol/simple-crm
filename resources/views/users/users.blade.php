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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>CEO</td>
                    <td>
                        <x-button-edit link="{{route('users.edit', ['user' => 0])}}"/>
                        <x-button-delete link="{{route('users.destroy', ['user' => 0])}}"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>CTO</td>
                    <td>
                        <x-button-edit link="{{route('users.edit', ['user' => 1])}}"/>
                        <x-button-delete link="{{route('users.destroy', ['user' => 1])}}"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Green</td>
                    <td>Manager</td>
                    <td>
                        <x-button-edit link="{{route('users.edit', ['user' => 2])}}"/>
                        <x-button-delete link="{{route('users.destroy', ['user' => 2])}}"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
