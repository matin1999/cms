@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('status'))
            <p class="badge badge-danger">{{session('status')}}</p>
        @endif
        <h2>login</h2>
        <form action="{{route('mobile')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="phone">mobile phone</label>
                <input type="text" class="form-control" id="mobile" name="mobile">
            </div>
            <button type="submit" class="btn btn-primary">send verification code</button>
        </form>
    </div>
@endsection
