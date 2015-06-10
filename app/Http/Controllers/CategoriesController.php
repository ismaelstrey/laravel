<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriesRequest;
use Illuminate\HttpResponse;
//use Illuminate\Http\Request;

class CategoriesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $categories = Category::all();
		return view('categories.index',compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('categories.create',compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoriesRequest $request)
	{
        $inputs=$request->all();
        Category::create($inputs);
        return redirect('categories');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Category $category)
	{
        //$art=$category->articles;

        //$category=$category->hasMany('App\Article')->get();
        //$category=Category::findOrFail($category->id);
        //$articles=$category->hasMany('App\Article')->get()->toArray();
        //print_r($category->articles->toArray());
		return view('categories.show',compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Category $category)
	{
		//$category = Category::findOrFail($id);
        return view('categories.edit',compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Category $category,CategoriesRequest $request)
	{
        $category->update($request->all());
        return redirect('categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Category $category)
	{
        $category->delete();
        return redirect()->action('CategoriesController@index');
	}

}
