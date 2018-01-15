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
                    <!-- <a href="{{ route('reviews.create') }}" class="btn btn-primary">Add</a>
                    <a href="{{ route('home') }}" class="btn btn-success">Menu</a> -->
                </div>  <!-- End panel-heading -->
                <div class="panel-body">
                    @if (count($reviews) === 0)
                        <p>There are no reviews!</p>
                    @else
                        <table class="table table-hover">
                            <thead>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                        @foreach ($reviews as $review)
                                <tr>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->description}}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{ route('reviews.show', array('review' => $review)) }}" class="btn btn-default">View</a>
                                        <!-- <a href="{{ route('reviews.edit', array('review' => $review)) }}" class="btn btn-primary">Edit</a>
                                        <form style="display:inline-block" method="POST" action="{{ route('reviews.destroy', array('review' => $review)) }}">
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
