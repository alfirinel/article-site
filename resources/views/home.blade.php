<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Logo</a>
        </div>
        @if (!Auth::guest())
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/logout') }}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
            </ul>
        @endif
    </div>
</nav>
<div class="container-fluid">
    @if (count($articles) > 0)
    <div class="row content">
        <div class="col-sm-9">
            @foreach ($articles as $article)
            <hr>
            <h2>{{ $article->name }}</h2>
            <h5><span class="glyphicon glyphicon-time"></span> Post by {{ $article->user->login }} {{$article->created_at}}</h5>
            <p>{{ $article->article }}</p>
            <br><br>
            <hr>
            @endforeach
        </div>
    </div>

    @endif
</div>
{{$articles->links()}}
<footer class="container-fluid">
    <p>Footer Text</p>
</footer>

</body>
</html>