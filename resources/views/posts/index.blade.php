@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="pull-left">
            <center>
            <h2>Simple Crud App Laravel </h2><br/>
            </center>
        </div>
    </div>
</div>
<div class="row">

    <div class="col-sm-8" style="margin:0 auto;">



        <form action="/search" method="get">

            @method('GET')
            @csrf

            <div class="input-group align-center col-m-6 " >

            <input type="search" name="search" placeholder="Search..." class="form-control col-sm-3 align-center" >
            <input type="submit" class="btn btn-primary btn-m align-left" value="Search"/>
            </div>

        </form>


<table class="table table-bordered">

        <div class="" style="float:right;margin:7px;">
            <a href="{{route('posts.create')}}" class="btn btn-success btn-m align-right">Add New</a>
            </div>
    <tr>
        <!--<th with="80px">No</th>-->
        <th>ID</th>
        <th>Title</th>
        <th>Body</th>
        <th>Date Created</th>
        <th>Date Updated</th>
        <th>Action</th>
    </tr>
    @foreach ($post as $key => $posts)
        <tr>

            <!--<td>{{++$key}}</td>-->
            <td>{{$posts->id}}</td>
            <td>{{$posts->title}}</td>
            <td>{{$posts->body}}</td>
            <td>{{$posts->created_at}}</td>
            <td>{{$posts->updated_at}}</td>

            <td>

                <form action ="{{route('posts.destroy', $posts->id)}}" method="post">

                    @method('DELETE')
                    @csrf
                    <button type ="submit" class="btn btn-danger btn-sm">Delete</button>
                    <a href="{{route('posts.show', $posts->id)}}" class="btn btn-warning btn-sm">Show</a>
                    <a href="{{route('posts.edit', $posts->id)}}" class="btn btn-info btn-sm">Edit</a>
                </form>
            </td>

        </tr>
    @endforeach
    </table>
    {{ $post->links() }}

</div>
</div>

@endsection