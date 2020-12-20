@extends('layouts.app')

@section('content')
    <div class="container">
    <table class="table table-striped table-light">
        @if(session('status'))
            <p class="alert alert-primary">{{session('status')}}</p>
        @endif
        <thead>
        <tr>
            <th scope="col">title</th>
            <th scope="col">number of this post</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tags as $tag)
            <tr>
            <tr>
                <td><a href="{{route('tags.show',$tag)}}" class="text-primary">{{$tag->title}}</a></td>
                <td>{{count($tag->posts)}}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
            <div>
                {{ $tags->links('pagination::bootstrap-4') }}
            </div>
    </div>
@endsection
