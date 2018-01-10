@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Welcome to Movies!</h2></div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <a href="{{ route('movies.index') }}" class="btn btn-success">Movies</a>
                            <a href="{{ route('genres.index') }}" class="btn btn-success">Genres</a>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <p>Now you can add all your favourite movies :)</p>
                            <p>To help you find any new and interesting movies just follow the links below.</p>

                            <ul>
                                <li><a href="http://www.imdb.com">imdb</a></li>
                                <li><a href="http://entertainment.ie/cinema/">Entertainment.ie</a></li>
                                <li><a href="http://www.movies.ie/">Movies.ie</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
