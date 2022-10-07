@extends('layouts.layout')
@section('content')
    <button class="btn btn-success mt-2 mb-2">Create user</button>
    <div class="card">
        <div class="card-header">
            Clients list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Position</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>CEO</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>CTO</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>Green</td>
                    <td>Manager</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
