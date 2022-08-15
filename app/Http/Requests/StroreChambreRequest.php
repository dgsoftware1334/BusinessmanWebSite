<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StroreChambreRequest extends FormRequest
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
            'photo' => 'required',
            'fb' =>['url', 'regex:/(?:https?:\/\/)?(?:www\.)?(?:facebook|fb|m\.facebook)\.(?:com|me)\/(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]+)(?:\/)?/i
            ', 'nullable'],
            'insta' => ['nullable','regex:/(?:(?:http|https):\/\/)?(?:www\.)?(?:instagram\.com|instagr\.am)\/([A-Za-z0-9-_\.]+)/'],
            'twit' => ['nullable','regex:/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/'],
            'linked' => ['nullable','regex:/https:\\/\\/[a-z]{2,3}\\.linkedin\\.com\\/.*$/'],
        ];
    }


    public function messages()
    {
        return [
            'sujet.required' => 'Le champs titre (fr) est obligatoire',
            'description.required' => 'Le champs description (fr) est obligatoire',
            'adresse.required' => 'Le champs adresse  est obligatoire',
            'telephone.required' => 'Le champs telephone  est obligatoire',
            'photo.required' => 'Le champs image  est obligatoire',
            'fb' => 'Le lien que vous avez saisi ne correspond pas à un compte facebook',
            'insta' => 'Le lien que vous avez saisi ne correspond pas à un compte instagram',
            'twit' => 'Le lien que vous avez saisi ne correspond pas à un compte twitter',
            'linked' => 'Le lien que vous avez saisi ne correspond pas à un compte linkedin',




        ];
    }
}
