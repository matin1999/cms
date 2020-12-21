@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('error'))
            <p class="text-dander">{{session('error')}}</p>
        @endif
        <h2>code</h2>
        <form action="{{route('verify.code')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="username">pass</label>
                <input type="text" class="form-control" id="code" name="code">
                <input type="hidden" name="mobile" value="{{$mobile}}">
            </div>
            <button type="submit" class="btn btn-primary">verify</button>
        </form>
    </div>
@endsection
