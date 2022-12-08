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
                @if($projects->isEmpty())
                    <tr>
                        <td colspan="7">Add any projects</td>
                    </tr>
                @else
                @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td><a href="{{route('projects.show', $project->id)}}">{{$project->title}}</a></td>
                    @foreach($clients as $client)
                        @if($client->id === $project->clients_id)
                            <td>{{$client->company}}</td>
                        @endif
                    @endforeach
                    @foreach($users as $user)
                        @if($user->id === $project->user_id)
                            <td>{{$user->first_name}}</td>
                        @endif
                    @endforeach
                    <td>{{$project->price}}</td>
                    <td>{{$project->deadline}}</td>
                    <td>
                        <x-button-edit link="{{route('projects.edit', $project->id)}}"/>
                        <x-button-delete link="{{route('projects.destroy', $project->id)}}"/>
                    </td>
                </tr>
                @endforeach
                @endif
                </tbody>
            </table>
            {{$projects->links()}}
        </div>
    </div>
@endsection
