<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFondRequest extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'description' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'nom.required' => 'Le champs nom est obligatoire',
            'prenom.required' => 'Le champs preom (fr) est obligatoire',
            'description.required' => 'Le champs description (fr) est obligatoire',
           
   
   

        ];
    }
}
