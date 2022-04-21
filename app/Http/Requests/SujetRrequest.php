<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SujetRrequest extends FormRequest
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
            'titre' => 'required',
            'details' => 'required',
            'image' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titre.required' =>  trans( key: 'validation.required'),
            'details.required' =>  trans( key: 'validation.required'),
            'image.required' =>  trans( key: 'validation.required')
   
   

        ];
    }
}
