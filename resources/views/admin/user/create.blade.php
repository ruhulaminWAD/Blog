@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Create User</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('user_store') }}" method="get">{{ csrf_field() }}
            <div class="mb-2">
                <label class="form-label" for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <!-- <div class="mb-2">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" name="password" id="password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2">
                <label class="form-label" for="confirmPassword">Confirm Password</label>
                <input class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                @error('confirmPassword')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div> -->
            <div class="mb-2">
                <input class="btn btn-success" type="submit" value="Add User">
            </div>
        </form>
    </div>
</div>
@endsection