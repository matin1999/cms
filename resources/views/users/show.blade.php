@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped table-light">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">posts number</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{count($user->posts)}}</td>
                </tr>
            </tbody>
        </table>
        <div class="card">Posts</div>
        <div class="card-columns">
            @foreach($user->posts as $post)
                <div>
                    <a class="card-title">{{$post->title}}</a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
