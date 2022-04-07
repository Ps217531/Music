<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bandRequest extends FormRequest
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
            'name' => 'required|max:100',
            'genre' => 'required|max:100',
            'founded' => 'required|max:100',
            'active_til' => 'required|max:20',

        ];

    }

    public  function messages()
    {
        return [
            'name.required' => 'Type een waarde in!',
            'name.max' => 'U hebt een te lange titel!',

            'year.max' => 'voer een getal van vier letters in!',
            'times_sold.required' => 'Type een waarde in!',


        ];
    }
}
