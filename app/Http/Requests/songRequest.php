<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class songRequest extends FormRequest
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
            'title' => 'required|max:100',
            'singer' => 'required|max:100',
        ];

    }

    public  function messages()
    {
        return [
            'title.required' => 'Type een waarde in!',
            'title.max' => 'U hebt te lang titel!',

            'singer.max' => 'U hebt te lang naam!',
        ];
    }
}
