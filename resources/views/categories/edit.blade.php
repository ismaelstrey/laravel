@extends('app')
@section('content')
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title text-center">Edit Category</h3>
        </div>
        <div class="panel-body">
            {!! Form::model ($category,['url'=>'categories/'.$category->title,'method'=>'PATCH']) !!}
                @include('categories.form',['btn'=>'Edit Category'])
            {!! Form::close () !!}
        </div>
    </div>
@stop