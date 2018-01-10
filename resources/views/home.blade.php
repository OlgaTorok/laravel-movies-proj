@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><h2>Menu</h2></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div class="row">
                        <div class="col-md-11 col-md-offset-1">
                            <a href="{{ route('movies.index') }}" class="btn btn-primary">Movies</a>
                            <a href="{{ route('genres.index') }}" class="btn btn-primary">Genres</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
