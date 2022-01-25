<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'description' => 'required|max:255',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'dure' => 'required',
            'type' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'sujet.required' => 'Le champs sujet (fr) est obligatoire',
            'description.required' => 'Le champs description (fr) est obligatoire',
            'date_debut.required' => 'La date de debut est obligatoire',
            'date_fin.required' => 'La date de fin est obligatoire',
            'dure.required' => 'La duré est obligatoire',
            'type.required' => 'Le type est obligatoire',
   
   

        ];
    }
}
