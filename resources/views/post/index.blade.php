@extends('layouts.app')

@section('content')
    <div class="container">
    <table class="table table-striped table-light">
        @if(session('status'))
            <p class="badge badge-danger">{{session('status')}}</p>
        @endif
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">title</th>
            <th scope="col">post slug</th>
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
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
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
