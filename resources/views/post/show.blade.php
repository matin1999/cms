@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('status'))
            <p class="alert alert-primary">{{session('status')}}</p>
        @endif
        <div class="row justify-content-center">
            <img src="{{ is_link($post->image->path) ? $post->image->path : asset(str_replace('public','storage' ,$post->image->path)) }}"/>
        </div>

        <div>
            <h3>tags</h3>
        @foreach($post->tags as $tag)
            <span class="badge badge-secondary">{{$tag->title}}</span>
        @endforeach
        </div>
        <br>
        <div>
            <h3>categories</h3>
        @foreach($post->categories as $category)

            <span class="badge badge-primary">{{$category->title}}</span>
        @endforeach
        </div>
        <div>
            <h3>content</h3>
            <p class="card-body">{{$post->content}}</p>
        </div>
    @if(auth()->user()->role='admin' || auth()->id()==$post->author->id)
        <form action="{{route('post.draft', $post)}}" method="post">
            @csrf
            @method('post')
            @if($post->published==1)
                <button class="btn btn-warning btn-lg btn-block"
                        onclick="return confirm('are you sure ?')">draft
                </button>
            @else
                <button class="btn btn-success btn-lg btn-block"
                        onclick="return confirm('are you sure ?')">publish
                </button>
            @endif
        </form>
            @endif
            <br>
        <div>
            <a type="button" class="btn btn-secondary btn-lg btn-block" href="{{route('posts.index')}}" >Back</a>
        </div>
    </div>
@endsection
