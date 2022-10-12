<?php

namespace App\Http\Requests\SubScriber;

use Illuminate\Foundation\Http\FormRequest;

class DelateSubScriberRequest extends FormRequest
{

    public function rules()
    {
        return [
            'id' => 'required|int'
        ];
    }
}
