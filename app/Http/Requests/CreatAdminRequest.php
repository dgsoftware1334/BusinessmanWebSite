<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatAdminRequest extends FormRequest
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
            'email'=>'required|email|unique:users,email',
            'cemail'=>'required|email|unique:users,email|same:email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
        ];
    }
}
