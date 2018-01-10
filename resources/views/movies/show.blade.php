@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Movie: {{ $movie->title }}
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Title</td>
                                <td>{{ $movie->title }}</td>
                            </tr>
                            <tr>
                                <td>Length</td>
                                <td>{{ $movie->length }}</td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td>{{ $movie->year }}</td>
                            </tr>
                            <tr>
                                <td>Rating</td>
                                <td>{{ $movie->rating }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('movies.index') }}" class="btn btn-default">Back</a>
                    <a href="{{ route('movies.edit', array('movie' => $movie)) }}" class="btn btn-primary">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('movies.destroy', array('movie' => $movie)) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
