@extends('layouts.layout')

@section('content')
    <x-button-create link="{{route('clients.create')}}">Create client</x-button-create>

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
                    <th scope="col">Assigned user</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if($clients->isEmpty())
                    <tr>
                        <td colspan="6">Add any company</td>
                    </tr>
                @else
                @foreach($clients as $client)
                <tr>
                    <th scope="row">{{$client->id}}</th>
                    <td>{{$client->company}}</td>
                    <td>{{$client->number}}</td>
                    <td>{{$client->activity}}</td>
                    <?php $flag = 0; ?>
                    @foreach($users as $user)
                        @if($user->id == $client->user_id)
                            <td>{{$user->name}}</td>
                            <?php $flag = 1; ?>
                        @endif
                    @endforeach
                    @if($flag === 0)
                        <td>Was deleted</td>
                    @endif
                    <td>
                        <x-button-edit link="{{route('clients.edit', $client->id)}}"/>
                        <x-button-delete link="{{route('clients.destroy', [$client->id])}}"/>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            {{$clients->links()}}
        </div>
    </div>
@endsection
