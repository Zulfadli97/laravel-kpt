<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|min:5',
            'body' => 'required|min:10',
            'attachment' => 'mimes:pdf'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Sila isi tajuk',
            'body.required' => 'Sila isi kandungan',
            'title.min' => 'Minimum 5'
        ];
    }
}
