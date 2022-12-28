@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add Category</h3>
        </div>
        <div class="card-body">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif
            <form action="{{ route('category_store')}}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input class=" form-control" type="text" name="name" id="name">
                </div>
                @error('name')
                    <p class="text-danger">{{ $message  }}</p>
                @enderror
                <input class="btn btn-success" type="submit" value="Add Category">
            </form>
        </div>
    </div>
@endsection
