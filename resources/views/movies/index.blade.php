@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Movies</h3>
                    <a href="{{ route('movies.create') }}" class="btn btn-primary">Add</a>
                </div>  <!-- End panel-heading -->
                <div class="panel-body">
                    @if (count($movies) === 0)
                        <p>There are no movies!</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>Length</th>
                                <th>Year</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                        @foreach ($movies as $movie)
                                <tr>
                                    <td>{{ $movie->title }}</td>
                                    <td>{{ $movie->length}}</td>
                                    <td>{{ $movie->year }}</td>
                                    <td>{{ $movie->rating }}</td>
                                    <td>
                                        <a href="{{ route('movies.show', array('movie' => $movie)) }}" class="btn btn-default">View</a>
                                        <!-- <a href="{{ route('movies.edit', array('movie' => $movie)) }}" class="btn btn-primary">Edit</a>
                                        <form style="display:inline-block" method="POST" action="{{ route('movies.destroy', array('movie' => $movie)) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="form-control btn btn-danger">Delete</a>
                                        </form> -->
                                   </td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>  <!-- End panel-body -->
            </div>  <!-- End panel -->
        </div>  <!-- End col-md-12 -->
    </div>  <!-- End row -->
</div>  <!-- End container -->

@endsection
