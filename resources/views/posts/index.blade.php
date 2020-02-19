@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="pull-left">
            <center>
            <h2>Basic Crud App Laravel </h2>
            </center>
        </div>
    </div>
</div>
<div class="row">
    
    <div class="col-sm-8" style="margin:0 auto;">
    
<table class="table table-bordered">
    <div class="" style="float:right;margin:7px;">
        <a href="{{route('posts.create')}}" class="btn btn-success btn-m align-right">Add New</a>
        </div>
    <tr>
        <th with="80px">No</th>
        
        <th>Title</th>
        <th>Body</th>
        <th>Date Created</th>
        <th>Date Updated</th>
        <th>Action</th>
  
        
    </tr>
    @foreach ($post as $key => $posts)
        <tr>

            <td>{{++$key}}</td>
            
            <td>{{$posts->title}}</td>
            <td>{{$posts->body}}</td>
            <td>{{$posts->created_at}}</td>
            <td>{{$posts->updated_at}}</td>

            <td>
                <form action ="{{route('posts.destroy', $posts->id)}}" method="post">
                    <button type ="submit" class="btn btn-danger btn-sm">Delete</button>
                    <a href="{{route('posts.show', $posts->id)}}" class="btn btn-warning btn-sm">Show</a>
                    <a href="{{route('posts.edit', $posts->id)}}" class="btn btn-info btn-sm">Edit</a>
                </form>
            </td>

        </tr>
    @endforeach


    </table>

</div>

</div>
 

@endsection