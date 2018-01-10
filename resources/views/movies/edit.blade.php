@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edit Movie</h3>
                </div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('movies.update', array('movie' => $movie)) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $movie->title) }}" />
                        </div>
                        <div class="form-group">
                            <label for="length">Length</label>
                            <input type="text" class="form-control" id="length" name="length" value="{{ old('length', $movie->length) }}" />
                        </div>
                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" id="year" name="year" value="{{ old('year', $movie->year) }}" />
                        </div>
                        <div class="form-group">
                            <label for="rating">Rating</label>
                            <input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating', $movie->rating) }}" />
                        </div>

                        <a href="{{ route('movies.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection