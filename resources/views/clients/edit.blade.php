@extends('layouts.layout')
@section('content')
    <div class="card mt-3">
        <div class="card-header">
            Create client
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('clients.update', $client->id)}}" method="post">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label for="company" class="form-label">Name of company</label>
                    <input type="text" class="form-control" id="company" name="company" placeholder="Google" value="{{$client->company}}">
                </div>
                <div class="mb-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="text" class="form-control" id="number" name="number" placeholder="888-888-888" value="{{$client->number}}">
                </div>
                <div class="mb-3">
                    <label for="activity" class="form-label">Activity</label>
                    <input type="text" class="form-control" id="activity" name="activity" placeholder="Media" value="{{$client->activity}}">
                </div>
                <div class="mb-3">
                    <label for="assigned" class="form-label">Assigned user</label>
                    <select class="form-select" id="assigned" name="user_id[]">
                        @foreach($users as $user)
                            @if($user->id === $client->user_id)
                                <option value="{{$user->id}}" selected>{{$user->first_name}}</option>
                                @continue
                            @endif
                            <option value="{{$user->id}}">{{$user->first_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>

            </form>
        </div>
    </div>

@endsection
