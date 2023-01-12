<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewsRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:20'],
            //'slug' => ['required', 'unique:skills,slug,']
            //'slug' => ['required', 'unique:skills,slug,' . $this->skill->id]
            'text' => ['required']
        ];
    }
}
