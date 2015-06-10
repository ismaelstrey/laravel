@extends('app')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="text-center panel-title">Add Article</h3>
        </div>
        <div class="panel-body">
            {!! Form::model ($article,['url'=>'categories/'.$category->title.'/articles/'.$article->title,'files'=>'true','method'=>'PATCH']) !!}
            @include('articles.form',['btn'=>'Edit Article'])
            {!! Form::close () !!}<br>
            {!! Form::open (['method'=>'DELETE', 'url'=> ['categories/'.$category->title.'/articles/'.$article->title]])  !!}
            <input type="submit" class="btn btn-danger btn-lg" value="Delete">
            {!! Form::close ()  !!}
        </div>
    </div>
@stop
