@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create Tag</h3>
        </div>
        <div class="card-body">
            <!-- @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')}}
                </div>
            @endif -->
            <form action="{{ route('tag_store')}}" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="TagName">Tag Name</label>
                    <input class=" form-control" type="text" name="TagName" id="TagName">
                </div>
                @error('TagName')
                    <p class="text-danger">{{ $message  }}</p>
                @enderror
                <input class="btn btn-success" type="submit" value="Add Tag">
            </form>
        </div>
    </div>
@endsection
