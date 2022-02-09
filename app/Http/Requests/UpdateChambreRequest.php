<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChambreRequest extends FormRequest
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
            'sujet' => 'required',
            'description' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'politique' => 'required',
          
        ];
    }

      
    public function messages()
    {
        return [
            'sujet.required' => 'Le champs titre (fr) est obligatoire',
            'description.required' => 'Le champs description (fr) est obligatoire',
            'adresse.required' => 'Le champs adresse  est obligatoire',
            'telephone.required' => 'Le champs telephone  est obligatoire',
            
            
   
   

        ];
    }
}
