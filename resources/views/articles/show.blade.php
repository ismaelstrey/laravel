@extends('app')
@section('content')
    <div class="row">
        <a href="{{ action('CategoriesController@show',$category->title) }}" class="btn btn-success">Back</a><br><br>
        <div class="col-sm-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">{{ $article->title  }}</h3>
                </div>
                <div class="panel-body">
                    {!! $article->body !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@stop