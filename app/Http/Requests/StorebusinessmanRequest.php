<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorebusinessmanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
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
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:5|max:30',
            'cpassword'=>'required|min:5|max:30|same:password',
            'photo'=>'required',
            'lienfb' => ['nullable','regex:/^(http|https)\:\/\/www.facebook.com\/.*/i'],
            'lieninsta' => ['nullable','regex:/(?:(?:http|https):\/\/)?(?:www\.)?(?:instagram\.com|instagr\.am)\/([A-Za-z0-9-_\.]+)/'],
            'lientwit' => ['nullable','regex:/http(?:s)?:\/\/(?:www\.)?twitter\.com\/([a-zA-Z0-9_]+)/'],
            'linked' => ['nullable','regex:/(https?:\/\/(www.)|(www.))?linkedin.com\/(mwlite\/|m\/)?in\/[a-zA-Z0-9_.-]+\/?/'],
          
            
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
            'password.required' => trans( key: 'validation.required'),
            'cpassword.required' => trans( key: 'validation.required'),
             'photo.required'=> trans( key: 'validation.required'),
             'lienfb' => 'Le lien que vous avez saisi ne correspond pas à un compte facebook',
             'lieninsta' => 'Le lien que vous avez saisi ne correspond pas à un compte instagram',
             'lientwit' => 'Le lien que vous avez saisi ne correspond pas à un compte twitter',
             'linked' => 'Le lien que vous avez saisi ne correspond pas à un compte linkedin',

        ];
    }

}
