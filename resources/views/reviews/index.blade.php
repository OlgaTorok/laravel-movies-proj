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
                    <h3>Reviews</h3>
                    <!-- <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add</a> -->
                    <a href="{{ route('home') }}" class="btn btn-success">Menu</a>
                </div>  <!-- End panel-heading -->


                <div class="panel-body">
                    @if (count($reviews) === 0)
                        <p>There are no reviews!</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Movie Id</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                        @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->description }}</td>
                                    <td>{{ $review->movie_id }}</td>
                                    <td>
                                        <!-- <a href="{{ route('reviews.show', array('review' => $review)) }}" class="btn btn-default">View</a> -->
                                        <a href="{{ route('reviews.edit', array('review' => $review)) }}" class="btn btn-primary">Edit</a>
                                        <form style="display:inline-block" method="POST" action="{{ route('reviews.destroy', array('review' => $review)) }}">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="form-control btn btn-danger">Delete</a>
                                        </form>
                                   </td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
                    @endif

                    <hr />
                    <h4>Add new review</h4>
                    <form method="POST" action="{{ route('reviews.store') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" />
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}" />
                        </div>
                        <div class="form-group">
                            <label for="movie_id">Movie Id</label>
                            <input type="text" class="form-control" id="movie_id" name="movie_id" value="{{ old('movie_id') }}" />
                        </div>

                        <a href="{{ route('reviews.index') }}" class="btn btn-default">Cancel</a>
                        <button type="submit" id="btn-submit" class="btn btn-primary pull-right">Submit</button>
                    </form>
                </div>  <!-- End panel-body -->



            </div>  <!-- End panel -->
        </div>  <!-- End col-md-12 -->
    </div>  <!-- End row -->
</div>  <!-- End container -->

@endsection
