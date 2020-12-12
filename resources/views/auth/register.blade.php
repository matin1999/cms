@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('error'))
            <p class="text-dander">{{session('error')}}</p>
        @endif
        <h1>ورود</h1>
        <form action="{{route('loginpost')}}" method="post">
            @csrf

            <div class="form-group">
                <label for="username"> یا شماره یا ایمیل</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>

            <div class="form-group">
                <label for="password">رمز</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <button type="submit" class="btn btn-primary">ورود</button>
        </form>
    </div>
@endsection
