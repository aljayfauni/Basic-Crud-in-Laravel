@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('posts.store')}}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                {{$post->title}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                            <div class="col-md-6">
                                {{$post->body}}
                            </div>

                                
                        <div class="form-group row mb-0">
                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
