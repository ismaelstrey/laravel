@extends('app')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading text-center">
            <h3>
                Add Category
            </h3>
        </div>
        <div class="panel-body">
            {!! Form::open (['url'=>'categories']) !!}
                @include('categories.form',['btn'=>'Add Category'])
            {!! Form::close () !!}
        </div>
    </div>
@stop