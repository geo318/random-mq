<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title.*' => request()->isMethod('post') 
                ? 'required|min:1|max:255|unique:movies,title'
                : 'required|min:1|max:255|unique:movies,title,' . last($this->segments()),
        ];
    }
}
