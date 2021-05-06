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
    // unique:users|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/|
    public function rules()
    {
        return [
            'name' => 'required|max:150|regex:/^[a-zA-Z ]*$/',
            'email' => 'email|required',
            'image' => 'required|image|mimes:jpg,png|max:300',
            // 'password'    => 'required|min:8|max:16|mixedCase()|numbers|symbols',
            'password'    => 'required|min:8|max:16',
            // 'password'    => 'required|min:8|max:16|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/',
            // 'password'    => 'required|min:8|max:16|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            // 'password'    => 'required|min:8|max:16|regex:/^.(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W).*$/',
            // 'password'    => ['required', 'min:8', 'max:16', mixedCase(), numbers(), symbols()]
        ];
    }
}
