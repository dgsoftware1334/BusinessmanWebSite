<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBusinessmanRequest extends FormRequest
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
            'lastname' => 'required',
            'datenaissance' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'address' => 'required',
            'email'=>'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans( key: 'validation.required'),
            'lastname.required' => trans( key: 'validation.required'),
            'datenaissance.required' => trans( key: 'validation.required'),
            'phone.required' => trans( key: 'validation.required'),
            'description.required' => trans( key: 'validation.required'),
            'address.required' => trans( key: 'validation.required'),
            'email.required' => trans( key: 'validation.required'),
       
   

        ];
    }
}
