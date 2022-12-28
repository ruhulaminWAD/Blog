@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">All User</h3>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Permission</th> 
                    <th >Administrator</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 0;
                @endphp
                @foreach($users as $user)
                    <tr>
                        <td>{{ $counter = $counter+3 }}</td>
                        <td><img src="{{ $user->profile_photo_path }}" alt="{{ $user->name }}" width="70" height="50" class="rounded"></td>
                        <td>{{ $user->name }}</td>
                        <td>
                            @if( $user->admin == 1)
                            <a class="btn btn-danger" href="{{ route('RemoveAdmin', ['id' => $user->id]) }}">RemoveAdmin</a>
                            @elseif( $user->admin == 0 )
                            <a class="btn btn-primary" href="{{ route('MakeAdmin', ['id' => $user->id]) }}">MakeAdmin</a> 
                            @endif
                        </td>
                        <td>
                            <a href="" class="btn btn-primary">Edit</a>
                            <a href="{{ route('user_destroy', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection



