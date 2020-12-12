@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('error'))
            <p class="text-dander">{{session('error')}}</p>
        @endif
        <h2>password</h2>
        <form action="{{route('verify.pass')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">pass</label>
                <input type="password" class="form-control" id="password" name="password">
                <input type="hidden" name="mobile" value="{{$mobile}}">
            </div>
            <button type="submit" class="btn btn-primary">login</button>
        </form>
    </div>
@endsection
