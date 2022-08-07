@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Articles</h2>
        <a href="{{ route('admin.users.create') }}" class="btn btn-default"><i class="fa fa-plus">New user</i></a>
        @if (count($users) > 0)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Login</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->login }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <br>
                            <form action="{{ route('admin.users.edit', $user->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('GET') }}

                                <button type="submit" class="btn btn-success">Edit</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        @endif
    </div>
@endsection
