@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('status'))
            <p class="text-dander">{{session('status')}}</p>
        @endif
        <table class="table table-striped table-light">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">mobile</th>
                <th scope="col">posts number</th>
                <th scope="col">register date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>

                    <td>{{$user->id}}</td>
                    <td>
                        <a href="{{route('users.show', $user)}}" class="text-primary">
                            {{$user->name}}
                            @if($user->activity==1)
                                <span  class="badge badge-primary">active</span>
                            @else
                                <span  class="badge badge-secondary">de active</span>
                            @endif
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->mobile}}</td>
                    <td>{{count($user->posts)}}</td>
                    <td>{{verta($user->date)}}</td>
                    <td class="col-3">
                        <form action="{{route('users.destroy', $user)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('are you sure ?')">delete user
                            </button>
                        </form>

                            <form action="{{route('users.deactive', $user)}}" method="post">
                                @csrf
                                @method('post')

                                @if($user->activity==1)
                                    <button class="btn btn-warning btn-sm"
                                            onclick="return confirm('are you sure ?')">de activate user
                                    </button>
                                @else
                                    <button class="btn btn-success btn-sm"
                                            onclick="return confirm('are you sure ?')">activate user
                                    </button>
                                @endif

                                {{--                            <a class="btn btn-{{$user->inactive_at ? 'secondary' : 'info'}} btn-sm" href="{{route('admin.users.changeStatus', $user)}}"--}}
                                {{--                               onclick="return confirm('{{$user->status_destination}} کاربر؟')">{{$user->status_destination}}</a>--}}
                            </form>

                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
        <div>
            {{ $users->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
