<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
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
            'name' => 'required',
            'body' => 'required|max:255'
        ];
    }
     /**
     * Get the error message that apply to the request.
     *
     * @return array
     */
    public function messages(){
        return [
            'name.required' => trans('validation.required'),
            'body.required' => trans('validation.required'),
            'body.min' => trans('validation.min')
        ];
    }
}
