@extends('app')
@section('content')
    <a href="{{ action('CategoriesController@create')  }}" class="btn btn-success"> Add Category </a><br><br>
    @if(!empty($categories))
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>
                        Name
                    </th>
                    <th>
                        Actions
                    </th>
                    <th>
                        Delete
                    </th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>
                            {{ $category->title }}
                        </td>
                        <td>
                            <a href="{{ action('CategoriesController@edit',$category->title) }}" class="btn btn-success">Edit</a>
                            <a href="{{ action('CategoriesController@show',$category->title) }}" class="btn btn-success">Show</a>
                            <a href="{{ action('ArticlesController@create',$category->title) }}" class="btn btn-success">Add Article</a>

                        </td>
                        <td>
                            {!! Form::open (['method'=>'DELETE', 'route'=> ['categories.destroy',$category->title]])  !!}
                            <input type="submit" class="btn btn-danger" value="Delete">
                            {!! Form::close ()  !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        No Categories
    @endif
@stop