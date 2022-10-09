@extends('layouts.layout')
@section('content')
    <x-button-create link="#">Create task</x-button-create>
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
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Create one function for user's profile</td>
                    <td>Open</td>
                    <td>10.05.2022</td>
                    <td>Mark</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Create animation for new cartoon</td>
                    <td>Close</td>
                    <td>20.08.2022</td>
                    <td>Mugen</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Develop marketing plan for new burger</td>
                    <td>Verification</td>
                    <td>01.01.2023</td>
                    <td>Boris</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
