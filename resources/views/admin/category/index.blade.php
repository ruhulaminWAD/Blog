@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All Category</h3>
        </div>
        <div class="card-body">
            @if($category->count() > 0)
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Permission</th>
                        <th>Action</th>
                        <th>Show</th>
                    </tr>
                    @foreach($category as $catData) 
                    <tr>
                        <td>{{ $catData->id}}</td>
                        <td>{{ $catData->name}}</td>
                        <td>
                            @if($catData->admin == 1)
                                <a class="btn btn-danger" href="{{ route('Deactive', ['id' => $catData->id]) }}">Deactive</a>
                                
                            @elseif($catData->admin == 0)
                                <a class="btn btn-success" href="{{ route('Active', ['id' => $catData->id]) }}">Active</a>
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{ route('category_edit', ['id' => $catData->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('category_destroy', ['id'=> $catData->id]) }}">Delete</a>
                        </td>
                        <td>
                            @if($catData->admin == 1)
                                {{ $catData->name}}
                            @endif 
                        </td>
                    </tr>    
                    @endforeach
                </table>
            @else
                <h3 class="text-center p-5">There are No Category Yet.</h3>
            @endif
            
        </div>
    </div>
@endsection