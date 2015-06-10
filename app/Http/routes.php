<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::model('categories', 'Category');
Route::model('projects', 'Project');
Route::bind ('categories',function ($value,$route) {
    return App\Category::whereTitle($value)->first();
});
Route::bind('articles',function($value,$route) {
    return App\Article::whereUrl($value)->first();
});
Route::resource('categories','CategoriesController');
//Route::POST('categories.store','CategoriesController@store');
Route::resource ('categories.articles','ArticlesController');
Route::get('/','CategoriesController@index');
//Route::POST('categories.articles','ArticlesController@store');