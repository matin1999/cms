@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-4 d-flex align-items-center justify-content-between">
            <h1>new Post</h1>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary btn-lg btn-block">back</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
            @csrf

            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="title">Content</label>
                <input type="text" class="form-control" id="content" name="content">
            </div>

            <div class="form-group">
                <label for="tags">tags</label>
                <select name="tags[]" class="custom-select" id="tags" multiple>
                    @foreach($tags as $key=>$value)
                        <option value="{{$value}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="tags">categories</label>
                <select name="categories[]" class="custom-select" id="categories" multiple>
                    @foreach($categories as $key=>$value)
                        <option value="{{$value}}">{{$key}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="form-group form-check">
                <input type="hidden" name="done" value="0">
                <input type="checkbox" class="form-check-input" id="published" name="published" value="1">
                <label class="form-check-label" for="done">publish?</label>
            </div>

            <button type="submit" class="btn btn-primary">Post</button>
        </form>
    </div>
@endsection

