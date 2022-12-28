@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
        </div>
        <div class="card-body">
        <form action="{{ route('update_post', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
        	<div class="mb-3">
        		<label for="title" class="">Title:</label>
        		<input type="text" class="form-control" name="title" placeholder="Enter The Post Title" id="title" value="{{$post->title}}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
        	</div>
            <div class="mb-3">
                <label for="image" class="">Image:</label>
                <input type="file" class="form-control" name="image" id="image" value="">
                @error('image')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="category" class="">Category:</label>
                <select name="category_id" id="category" class="form-control">
                @foreach($cat as $catData)
                <option value="{{$catData->id}}"
                    @if($post->category_id == $catData->id)
                        selected
                    @endif
                >{{$catData->name}}</option>
                @endforeach  
                </select>
                @error('category_id')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
 
            <div class="mb-3">
                <div class="">
                    <p>Tag:</p>
                    @foreach($tags as $tag)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input " value="{{$tag->id}}" id="{{$tag->tag}}" name="tags[]" 
                        @foreach($post->tags as $tg)
                            @if($tag->id == $tg->id)
                                checked
                            @endif
                        @endforeach >
                        <label class="form-check-label" for="{{$tag->tag}}">{{$tag->tag}}</label>
                    </div>
                    @endforeach
                    @error('tags')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>



            <div class="mb-3">
                <label for="content" class="">Content:</label>
                <textarea name="content" id="content" cols="30" rows="7" class="form-control" >{{$post->content}}</textarea value="">
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        	<input type="submit" class="btn btn-success" value="Update Post">
        </form>
        </div>
    </div>
@endsection
