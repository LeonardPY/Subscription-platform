<?php

namespace App\Http\Requests\SubScriber;

use Illuminate\Foundation\Http\FormRequest;

class CreateSubScriberRequest extends FormRequest
{

    public function rules()
    {
        return [
            'email' => [
                'required',
                'unique:subscribers',
                'string',
                'max:255'
            ],
            'website_id' => [
                'required',
                'int'
            ]
        ];
    }
}
