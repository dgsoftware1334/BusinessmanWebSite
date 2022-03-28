<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTenderRequest extends FormRequest
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

            'intitule' => 'required',
            'description' => 'required',
            'date_parution' => 'required',
            'date_limite' => 'required',
            'sacteur_id' => 'required',
            'wilaya' => 'required',
            'adresse' => 'required',
            'type' => 'required',
            'genre' => 'required',
         
            'societe' => 'required',
         
            
        ];
    }

    public function messages()
    {
        return [
            'intitule.required' => 'Le champs intitule est obligatoire',
            'description.required' => 'Le champs description est obligatoire',
            'date_parution.required' => 'Le champs date deparution est obligatoire',
            'date_limite.required' => 'Le champs date limite  est obligatoire',
            'sacteur_id.required' => 'Le secteur est obligatoire',
            'wilaya.required' => 'La wilaya est obligatoire',
            'adresse.required' => 'L\'adresse est obligatoire',
            'type.required' => 'Le type obligatoire',
            'genre.required' => 'Le genre obligatoire',
           
            'societe.required' => 'La societé est obligatoire',
           
   
   

        ];
    }
}
