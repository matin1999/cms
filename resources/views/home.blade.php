@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>last Posts</h3>
                    </div>
                    @if(auth()->check())
                        <div class="row justify-content-center">

                            <div class="col-md-8">
                                    <a type="link" class="btn btn-secondary btn-lg btn-block" href="{{route('posts.create')}}">+ Add Post</a>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="card-body">
                        @foreach($posts as $post)
                            <article>
                                <a href="{{route('posts.show',$post)}}" class="text text-center text-primary"> <h4>{{$post->title}}</h4></a>
                                <div>{{$post->content}}</div>
                                <h4>author: <span class="badge badge-danger">{{$post->author->name}}</span> in <span class="badge badge-primary">{{verta($post->date)}}</span></h4>
                                <div>
                                    Tags:
                                    @foreach($post->tags as $tag)
                                        <span>
                                            <span class="badge badge-warning">{{$tag->title}} {{count($tag->posts)}}
                                        </span>
                                    @endforeach
                                </div>
                                <div>
                                    categories:
                                    @foreach($post->categories as $category)
                                        <span class="badge badge-info">{{$category->title}}</span>
                                    @endforeach
                                </div>
                            </article>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <div>
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
