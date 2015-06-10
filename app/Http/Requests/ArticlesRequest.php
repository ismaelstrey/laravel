<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticlesRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'title'=>'required|min:4',
            'url'=>'alpha_num|min:4|required',
            'cover'=>'required|mimes:jpeg,bmp,png,jpg',
            //'cat_id'=>'required|integer|min:1',
            'body'=>'required',
		];
	}

}
