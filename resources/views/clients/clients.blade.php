@extends('layouts.layout')

@section('content')
    <x-button-create link="{{route('clientsCreate')}}">Create client</x-button-create>


    <div class="card">
        <div class="card-header">
            Clients list
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company</th>
                    <th scope="col">Number</th>
                    <th scope="col">Activity</th>
                    <th scope="col">Appointed</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Facebook</td>
                    <td>888-888-555</td>
                    <td>Media</td>
                    <td>Mark</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Disnay</td>
                    <td>789-456-123</td>
                    <td>Entertainment</td>
                    <td>Jacob</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Burger king</td>
                    <td>75-75</td>
                    <td>Fast-Food</td>
                    <td>Larry the Bird</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
