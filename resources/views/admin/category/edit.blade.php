@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Category</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('category_update', ['id' =>  $category->id]) }}" method="post">{{ csrf_field() }}
            <div class="mb-3">
                <label for="name">Name</label>
                <input class="form-control" type="text" name="name" id="name" value="{{ $category->name}}">
            </div>
            <input class="btn btn-success" type="submit" value="Edit Category">
            @error('name')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </form>
    </div>
</div>
@endsection