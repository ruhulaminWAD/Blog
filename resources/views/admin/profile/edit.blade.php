@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Profile</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update_profile', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
        <div class="mb-3">
                <label for="image" class="">Profile Image</label>
                <input type="file" class="form-control" name="image" id="image" value="">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="">Name </label>
                        <input type="text" class="form-control" name="name"  id="name" value="{{ $user->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="">Email</label>
                        <input type="text" class="form-control" name="email"  id="email" value="{{ $user->email }}">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="">Phone</label>
                        <input type="text" class="form-control" name="phone"  id="phone" value="{{ $user->profile->phone }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="mobile" class="">Mobile</label>
                        <input type="text" class="form-control" name="mobile"  id="mobile" value="{{ $user->profile->mobile }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                        <label for="address" class="">Address </label>
                        <input type="text" class="form-control" name="address"  id="address" value="{{ $user->profile->address }}">
                    </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="facebook" class="">Facebook</label>
                        <input type="text" class="form-control" name="facebook"  id="facebook" value="{{ $user->profile->facebook }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="youtube" class="">YouTube </label>
                        <input type="text" class="form-control" name="youtube"  id="youtube" value="{{ $user->profile->youtube }}">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="about" class="">About Us</label>
                <textarea name="about" id="about" cols="30" rows="5" class="form-control" >{{ $user->profile->about }}</textarea value="">
            </div>
        	<input type="submit" class="btn btn-success" value="Update Profile">
        </form>
    </div>
</div>
@endsection