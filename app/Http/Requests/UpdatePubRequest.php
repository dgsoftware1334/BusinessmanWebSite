<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePubRequest extends FormRequest
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
            'context' => 'required',
            'contenu' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'context.required' => 'Le champs context (fr) est obligatoire',
            'contenu.required' => 'Le champs contenu (fr) est obligatoire',
       
   
   

        ];
    }

}
