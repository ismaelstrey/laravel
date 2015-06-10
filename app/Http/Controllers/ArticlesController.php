<?php namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests;
//use App\Http\Controllers\Controller;
use App\Http\Requests\ArticlesRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
//use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Category $category)
    {
        $categories = Category::lists('title', 'id');
        return view('articles.create', compact('category', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Category $category, ArticlesRequest $request)
    {
        $file = Input::file('cover');
        //$file = $request->file();
        $filename = str_random(12);
        //return $file->getClientOriginalExtension();
        if ($file->move(public_path() . '/covers', $filename . '.' . $file->getClientOriginalExtension())) {
            $inputs = $request->all();
            $inputs['category_id'] = $category->id;
            $inputs['cover'] = '/covers/' . $filename . '.' . $file->getClientOriginalExtension();
            Article::create($inputs);
            return redirect()->action('ArticlesController@show', [$category->title, $inputs['url']]);

        } else {
            Session::flash('upload', 'Failed');
            redirect('articles@create');
        }
        //Storage::disk('local')->put(.'.'.$file->getClientOriginalExtension(),  File::get($file));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show(Category $category, Article $article)
    {
        if ($category->id == $article->category->id) {
            return view('articles.show', compact('category', 'article'));
        } else {
            return view('error.missing', array(), 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit(Category $category, Article $article)
    {
        if ($category->id == $article->category->id) {
            return view('articles.edit', compact('category', 'article'));
        } else {
            return view('error.missing', array(), 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update(Category $category, Article $article, Request $request)
    {
        // echo Input::hasFile('cover');
        if (Input::hasFile('cover')) {
            //echo 'hena';
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:4',
                'url' => 'alpha_num|min:4|required',
                'cover' => 'required|mimes:jpeg,bmp,png,jpg',
                'body' => 'required',
            ]);
            if (!$validator->fails()) {
                $filename = str_random(12);
                $file = Input::file('cover');
                if ($file->move(public_path() . '/covers', $filename . '.' . $file->getClientOriginalExtension())) {
                    $path = asset($article->cover);
                    //Storage::delete($article->cover);
                    //Storage::delete(asset());
                    $inputs = $request->all();
                    $inputs['category_id'] = $category->id;
                    $inputs['cover'] = '/covers/' . $filename . '.' . $file->getClientOriginalExtension();
                    unset($inputs['_method']);
                    unset($inputs['_token']);
                    $article->update($inputs);
                    return redirect()->action('ArticlesController@show', [$category->title, $article->url]);
                } else {
                    Session::flash('upload', 'Failed');
                    redirect('ArticlesController@create');
                }
            }
            //return redirect()->back()->withErrors($validator->errors());
        } else {
            //echo 'hena2';
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:4',
                'url' => 'alpha_num|min:4|required',
                //'cover' => 'required|mimes:jpeg,bmp,png,jpg',
                'body' => 'required',
            ]);
            if (!$validator->fails()) {
                $inputs = $request->all();
                unset($inputs['_method']);
                unset($inputs['_token']);
                $article->update($inputs);
                return redirect()->action('ArticlesController@show', [$category->title, $article->url]);
            }
            return redirect()->back()->withErrors($validator->errors());
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy(Category $category,Article $article)
    {
        if ($category->id == $article->category_id)
        {
            $article->delete();
        }
        return redirect()->action('CategoriesController@show', [$category->title]);

    }

}
