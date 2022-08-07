@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Articles</h2>
        <a href="{{ route('admin.article.create') }}" class="btn btn-default"><i class="fa fa-plus">New article</i></a>
        @if (count($articles) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Author</th>
                <th>Name</th>
                <th>Article</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->user->login }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ $article->article }}</td>
                <td>
                    <form action="{{ route('admin.article.destroy', $article->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <br>
                    <form action="{{ route('admin.article.edit', $article->id) }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('GET') }}

                        <button type="submit" class="btn btn-success">Edit</button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
            {{$articles->links()}}
        @endif
    </div>
@endsection
