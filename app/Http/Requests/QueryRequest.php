<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class QueryRequest extends FormRequest
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
            'lang' => 'required|alpha|between:2,3',
            'per_page' => 'sometimes|integer|between:1,3',
            'page' => 'sometimes|integer',
            'category' => 'sometimes|between:1,5',
            'tags' => 'sometimes|filled',
            'with' => 'sometimes|string|filled',
            'diff_time' => 'sometimes|integer|min:1'
        ];
    }

    public function messages()
    {
        return [
            'lang.required' => 'Lang parametar is requred!',
            'per_page.between' => 'per_page parametar shoud have between 1 and 3 digits'
        ];
    }

   protected function failedValidation(Validator $validator) 
   { 
        throw new HttpResponseException(response()->json($validator->errors()->all(), 422)); 
   }
}
