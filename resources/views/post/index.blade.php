@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @foreach($posts as $post)
                    <div class="card-columns">
                        <tr class="alert">
                            <td class="badge badge-dark">{{$post->id}}</td>
                            <td class="badge">{{$post->title}}</td>
                            <td class="badge badge-info">{{$post->slug}}</td>
                            <td class="badge badge-primary">{{$post->author->name}}</td>
                            <td class="badge badge-secondary">@foreach($post->categories as $category){{$category->title}}@endforeach</td>
                            <td class="badge badge-primary">@foreach($post->tags as $tag)<a cl href="#">{{$tag->title}}</a>@endforeach</td>
                        </tr>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
