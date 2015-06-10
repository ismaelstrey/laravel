@if (empty($errors->first('title')))
    <div class="form-group">
        {!! Form::label ('title','Title :',['class'=>'label-control']) !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
@else
    <div class="form-group has-error">
        {!! Form::label ('title','Title :',['class'=>'label-control']) !!}
        <small class="text-danger">{{$errors->first('title')}}</small>
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>
@endif
<div class="col-sm-4 col-sm-push-4">
    <center>
        {!! Form::submit($btn,['class'=>'btn btn-success']) !!}
    </center>
</div>