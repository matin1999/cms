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
                <th scope="col">image</th>
                <th scope="col">number of post of this category</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                <tr>
                    <td><a href="{{route('categories.show',$category)}}" class="text-primary">{{$category->title}}</a></td>
                    <td><img src="{{$category->image->path}}" class="img-fluid" style="width: 100px ;height: 50px"/></td>
                    <td>{{count($category->posts)}}</td>
                </tr>
            @endforeach

            </tbody>
        </table>
        <div>
            {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
