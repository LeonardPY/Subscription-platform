<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWebSiteRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => [
                'required|int'
            ],

            'name' => [
                'required',
                'string',
                'max:255'
            ]
        ];
    }

}
