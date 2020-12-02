@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                @foreach($posts as $post)
                    <article>
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->slug}}</td>
                            <td>{{$post->author->name}}</td>
                            <td>@foreach($post->categories as $category){{$category->title}}@endforeach</td>
                            <td>@foreach($post->tags as $tag){{$tag->title}}@endforeach</td>
                        </tr>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection
