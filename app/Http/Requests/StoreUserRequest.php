<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
			'name'     => 'required|max:255',
			'email'    => 'required|email|max:255|unique:users,email',
			'password' => 'required|min:7|max:255',
		];
    }
}
