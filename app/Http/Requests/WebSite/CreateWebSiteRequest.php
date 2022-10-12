<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class CreateWebSiteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
               'required',
                'unique:web_sites',
                'string',
                'max:255'
            ],

            'name' => [
                'required',
                'string',
                'max:255'
            ]
        ];
    }

}
