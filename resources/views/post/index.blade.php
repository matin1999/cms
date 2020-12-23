@extends('layouts.app')

@section('content')
    <div class="container">
    <table class="table table-striped table-light">
        @if(session('status'))
            <p class="alert alert-primary">{{session('status')}}</p>
        @endif
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">Manage</th>
            <th scope="col">author name</th>
            <th scope="col">categories</th>
            <th scope="col">tags</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('posts.show',$post)}}" class="text-primary">{{$post->title}}
                        @if($post->published==1)
                            <b>published</b>
                        @else
                        <b>draft</b>
                        @endif
                    </a></td>
                <td>
                    @if($post->user_id == auth()->id())

                        @if(is_null($post->deleted_at))
                            <div class="card-footer">
                                <form action="{{route('posts.destroy', $post)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('are you sure ?')">Delete Post
                                    </button>
                                </form>
                            </div>
                        @else
                            <form action="{{route('posts.terminate',$post->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('are you sure ?')">terminate Post
                                </button>
                            </form>

                            <form action="{{route('posts.restore', $post->id)}}" method="post">
                                @csrf
                                @method('POST')
                                <button class="btn btn-info btn-sm"
                                        onclick="return confirm('are you sure ?')">restore Post
                                </button>
                            </form>
                        @endif

                    @endif
                </td>
                <td>{{$post->author->name}}</td>
                <td>@foreach($post->categories as $category)<span class="badge badge-primary">{{$category->title}}</span>@endforeach</td>
                <td>@foreach($post->tags as $tag)<span class="badge badge-secondary">{{$tag->title}}</span>@endforeach</td>
                <td>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
            <div>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
    </div>
@endsection
