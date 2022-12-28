@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Post</h3>
        </div> 
        <div class="card-body">
            @if($posts->count() > 0)
            
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
                        <td>{{ $post->id}}</td>
                        <td><img src="{{ asset($post->image)}}" alt="{{ $post->title}}" width="100" height="120"></td>
                        <td>{{ $post->title}}</td>
                        <!-- <td>{{ $post->content}}</td> -->
                        <td>
                            {{ Str::limit($post->content, 40) }} 
                            <a data-bs-toggle="modal" href="#{{ $post->slug }}">see more</a>
                        </td>

                        <td>
                            <a href="{{ route('edit_post', ['id'=>$post->id]) }}" class="btn btn-success">Edit</a>
                            <a href="{{ route('destroy_post', ['id' => $post->id]) }}" class="btn btn-danger">Trash</a>
                        </td>
                    </tr>

                    <!-- The Modal -->
                    <div class="modal fade" id="{{ $post->slug }}">
                      <div class="modal-dialog">
                        <div class="modal-content">

                          <!-- Modal Header -->
                          <div class="modal-header">
                            <h4 class="modal-title">Post Details</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">
                            <p>{!! $post->content !!}</p>
                            <!-- <p>{!! $post->content !!}</p> -->
                          </div>

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>
                    
                    @endforeach
                </table>
                {{ $posts->links() }}
            @else
                <h3 class="text-center p-5">There are No Post Yet.</h3>
            @endif
            
        </div>
    </div>
    
@endsection

                    


