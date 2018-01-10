@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Movie: {{ $genre->name }}
                </div>

                <div class="panel-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td>{{ $genre->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('genres.index') }}" class="btn btn-default">Back</a>
                    <!-- <a href="{{ route('genres.edit', array('genre' => $genre)) }}" class="btn btn-primary">Edit</a>
                    <form style="display:inline-block" method="POST" action="{{ route('genres.destroy', array('genre' => $genre)) }}">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="form-control btn btn-danger">Delete</a>
                    </form> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
