@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Trashed Post</h3>
        </div> 
        <div class="card-body">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><img src="{{ asset($post->image)}}" alt="{{ $post->title}}" width="100" height="120"></td>
                        <td>{{ $post->title}}</td>
                        <td>{{ $post->content}}</td>
                        <td>
                            <a href="{{ route('restore_post', ['id' => $post->id]) }}" class="btn btn-success">Restore</a>
                            <a href="{{ route('kill_post', ['id' => $post->id]) }}" class="btn btn-danger">Permanently Delete </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            
            
        </div>
    </div>
@endsection
