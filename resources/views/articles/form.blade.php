<div class="form-group">
    {!! Form::label('title','Title :') !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('url','Url :') !!}
    {!! Form::text('url',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cover','Cover :' ) !!}
    {!! Form::file('cover',null,['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body','Body :') !!}
    {!! Form::textarea('body',null,['class'=>'form-control','id'=>'body']) !!}

</div>
<input type="submit" class="btn btn-success btn-lg" value="{{ $btn  }}">
@foreach($errors->all() as $error)
    {{ $error }}
@endforeach
@section('script')
    <script src="{{asset('js/tinymce/tinymce.min.js')}}"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste "
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
    </script>
@stop

