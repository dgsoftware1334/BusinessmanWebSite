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
            'fb' => ['regex:/^(http|https)\:\/\/www.facebook.com\/.*/i'],
            'insta' => ['regex:/(?:(?:http|https):\/\/)?(?:www\.)?(?:instagram\.com|instagr\.am)\/([A-Za-z0-9-_\.]+)/'],
            'twit' => ['regex:/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/'],
            'linked' => ['regex:/(https?:\/\/(www.)|(www.))?linkedin.com\/(mwlite\/|m\/)?in\/[a-zA-Z0-9_.-]+\/?/'],
          
        ];
    }

      
    public function messages()
    {
        return [
            'sujet.required' => 'Le champs titre (fr) est obligatoire',
            'description.required' => 'Le champs description (fr) est obligatoire',
            'adresse.required' => 'Le champs adresse  est obligatoire',
            'telephone.required' => 'Le champs telephone  est obligatoire',
            'fb' => 'Le lien que vous avez saisi ne correspond pas à un compte facebook',
            'insta' => 'Le lien que vous avez saisi ne correspond pas à un compte instagram',
            'twit' => 'Le lien que vous avez saisi ne correspond pas à un compte twitter',
            'linked' => 'Le lien que vous avez saisi ne correspond pas à un compte linkedin',
            
            
   
   

        ];
    }
}
