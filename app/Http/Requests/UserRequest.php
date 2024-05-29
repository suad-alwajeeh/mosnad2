<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return  [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|min:11',
            'date_of_birth' => 'required',
            'email' => 'nullable|email|unique:users,email',
            'avater' => 'nullable|image',
            'id_card' => 'nullable|image',
            'passport' => 'nullable|image',
        ];
    }
    // public function failedValidation(Validator $validator)
    // {
        
    //     throw new HttpResponseException(response()->json($validator->errors()->getMessages(), 422));
    // }
    public function messages()
    {
        return [
         ];
    }
}
