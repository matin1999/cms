@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('status'))
            <p class="alert alert-primary">{{session('status')}}</p>
        @endif
        <div>
            <h3>name</h3>

                <span class="badge badge-secondary">{{$user->title}}</span>
        </div>
        <br>
        <div>
            <h3>email</h3>
                <span class="badge badge-primary">{{$user->email}}</span>
        </div>
        <div>
            <h3>Post number</h3>
            <p class="card-body">{{count($user->posts)}}</p>
        </div>

        <div>
            <a type="button" class="btn btn-secondary btn-lg btn-block" href="#" >setting</a>
            <a type="button" class="btn btn-secondary btn-lg btn-block" href="{{route('user.post',$user)}}" >Post</a>
        </div>
    </div>
@endsection
