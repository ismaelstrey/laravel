@extends('app')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="text-center panel-title">Add Article</h3>
        </div>
        <div class="panel-body">
            {!! Form::open (['url'=>'categories/'.$category->title.'/articles','files'=>'true']) !!}
                @include('articles.form',['btn'=>'Add Article'])
            {!! Form::close () !!}
        </div>
    </div>
@stop
