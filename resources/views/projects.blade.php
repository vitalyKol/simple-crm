@extends('layouts.layout')
@section('button', 'Create project')
@section('content')
    <div class="card">
        <div class="card-header">
            Project list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Price</th>
                    <th scope="col">Deadline</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Add one function for user's profile</td>
                    <td>Facebook</td>
                    <td>99999$</td>
                    <td>10.05.2022</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Create animation for new cartoon</td>
                    <td>Disnay</td>
                    <td>5555$</td>
                    <td>20.08.2022</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Develop marketing plan for new burger</td>
                    <td>Burger king</td>
                    <td>100$</td>
                    <td>01.01.2023</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
