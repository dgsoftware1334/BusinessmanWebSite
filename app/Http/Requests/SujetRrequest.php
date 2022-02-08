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
            'titre.required' => 'Le champs titre est obligatoire',
            'details.required' => 'Le champs details est obligatoire',
            'image.required' => 'L image est obligatoire'
   
   

        ];
    }
}
