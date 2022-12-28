@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Tag</h3>
        </div>
        <div class="card-body">
            @if($tags->count() > 0)
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach($tags as $tag) 
                    <tr>
                        <td>{{ $tag->id}}</td>
                        <td>{{ $tag->tag}}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('edit_tag', ['id' => $tag->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('destroy_tag', ['id' => $tag->id]) }}">Delete</a>
                        </td>
                    </tr>    
                    @endforeach
                </table>
            @else
                <h3 class="text-center p-5">There are No Tag Yet.</h3>
            @endif
            
        </div>
    </div>
@endsection