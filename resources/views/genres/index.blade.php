@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <!-- @if (Session::has('message'))
            <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif -->

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Genre</h3>
                    <a href="{{ route('genres.create') }}" class="btn btn-primary">Add</a>
                    <a href="{{ route('home') }}" class="btn btn-success">Menu</a>
                </div>  <!-- End panel-heading -->
                <div class="panel-body">
                    @if (count($genres) === 0)
                        <p>There are no genres!</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($genres as $genre)
                                <tr>
                                    <td>{{ $genre->name }}</td>
                                    <td>
                                        <!-- <a href="{{ route('genres.show', array('genre' => $genre)) }}" class="btn btn-default">View</a> -->
                                        <a href="{{ route('genres.edit', array('genre' => $genre)) }}" class="btn btn-primary">Edit</a>
                                        <form style="display:inline-block" method="POST" action="{{ route('genres.destroy', array('genre' => $genre)) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="form-control btn btn-danger">Delete</a>
                                        </form>
                                   </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <form method="POST" action="{{ route('genres.store') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name">Add new genre</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                            </div>
                            <a href="{{ route('genres.index') }}" class="btn btn-default">Cancel</a>
                            <a href="{{ route('genres.create') }}" class="btn btn-primary">Add</a>
                            <!-- <button type="submit" class="btn btn-primary pull-right">Submit</button> -->
                        </form>
                    @endif
                </div>  <!-- End panel-body -->
            </div>  <!-- End panel -->
        </div>  <!-- End col-md-12 -->
    </div>  <!-- End row -->
</div>  <!-- End container -->

@endsection
