@extends('app')
@section('content')

    <div class="row">
        <h3>{{ $category->title }} Articles</h3>
        <a href="{{ action('ArticlesController@create',['category'=>$category->title])  }}" class="btn btn-success">Add Article</a><br>
        @foreach($category->articles->toArray() as $article)
            <div class="col-sm-4">
                <div class="panel">
                    <div class="panel-title">
                        <div class="panel-heading"><h3 class="text-center">{{$article['title']}}</h3></div>
                    </div>
                    <div class="panel-body">
                        <img style="width: 100%;" src="{{asset($article['cover']) }}" >
                    </div>
                    <div class="panel-footer">
                        <a class="text-center btn btn-block btn-default" href="{{ action('ArticlesController@show',['category'=>$category->title,'article'=>$article['url']])  }}">View</a><br>
                        <a class="text-center btn btn-block btn-success" href="{{ action('ArticlesController@edit',['category'=>$category->title,'article'=>$article['url']])  }}">Edit</a><br>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@stop