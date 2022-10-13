@extends('layouts.layout')
@section('content')
    <x-button-create link="{{route('projects.create')}}">Create project</x-button-create>
    <div class="card">
        <div class="card-header">
            Projects list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Assigned client</th>
                    <th scope="col">Assigned user</th>
                    <th scope="col">Price</th>
                    <th scope="col">Deadline</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Add one function for user's profile</td>
                    <td>Facebook</td>
                    <td>Mark</td>
                    <td>99999$</td>
                    <td>10.05.2022</td>
                    <td>
                        <x-button-edit link="#"/>
                        <x-button-delete link="#"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Create animation for new cartoon</td>
                    <td>Disnay</td>
                    <td>Ted</td>
                    <td>5555$</td>
                    <td>20.08.2022</td>
                    <td>
                        <x-button-edit link="#"/>
                        <x-button-delete link="#"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Develop marketing plan for new burger</td>
                    <td>Burger king</td>
                    <td>Stive</td>
                    <td>100$</td>
                    <td>01.01.2023</td>
                    <td>
                        <x-button-edit link="#"/>
                        <x-button-delete link="#"/>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
