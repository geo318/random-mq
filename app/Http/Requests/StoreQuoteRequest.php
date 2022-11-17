<?php

namespace App\Http\Requests;

use App\Models\Quote;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuoteRequest extends FormRequest
{
	public function rules()
	{
		return [
			'quote' => request()->isMethod('post')
				? 'required|min:2|max:255|unique:quotes,quote'
				: 'required|min:2|max:255|',
			'thumbnail' => request()->isMethod('post') 
                ? 'image|required' 
                : 'image',
		];
	}
}
