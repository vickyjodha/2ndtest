<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
    // |regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/|
    public function rules()
    {
        return [
            'name' => 'required|max:150|regex:/^[a-zA-Z ]*$/',
            'email' => 'email|required|unique:users',
            'image' => 'required|image|mimes:jpg,png|max:300',
            'password'    => 'required|min:8|max:16|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
            'hobbies' => 'required|array|min:2',
        ];
    }
    public function messages()
    {
        return [
            'password.regex'   => 'should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character',

        ];
    }
}
