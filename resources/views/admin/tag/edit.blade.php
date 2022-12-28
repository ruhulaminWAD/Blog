@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Tag</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('update_tag', ['id' =>  $tags->id]) }}" method="post">{{ csrf_field() }}
            <div class="mb-3">
                <label for="TagName">Tag Name</label>
                <input class="form-control" type="text" name="TagName" id="TagName" value="{{ $tags->tag}}">
            </div>
            @error('TagName')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input class="btn btn-success" type="submit" value="Update Tag">
        </form>
    </div>
</div>
@endsection