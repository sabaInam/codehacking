@extends('layouts.admin')




@section('content')


<h1>Posts</h1>


		
 <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>photo</th>
        <th>User</th>
        <th>category</th>
        
        <th>Title</th>
        <th>Body</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    	@if($posts)

    	@foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td><img height="50" src="{{$post->photo_id  ? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
        <td>{{$post->user->name}}</td>
        <td>{{$post->category_id}}</td>
        
        <td>{{$post->title}}</td>
        <td>{{$post->body}}</td>
        <td>{{$post->created_at->diffForhumans()}}</td>
        <td>{{$post->updated_at->diffForhumans()}}</td>
      </tr>
      @endforeach
     @endif
    </tbody>
  </table>

@stop