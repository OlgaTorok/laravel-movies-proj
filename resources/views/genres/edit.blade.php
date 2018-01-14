@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Edit Genres</h3>
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
                    <form method="POST" action="{{ route('genres.update', array('genre' => $genre)) }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Genre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('genre', $genre->name) }}" />
                        </div>
                        <a href="{{ route('genres.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" id="btn-submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
