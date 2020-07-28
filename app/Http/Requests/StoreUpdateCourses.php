<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCourses extends FormRequest
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
            'title' => 'required|unique|alpha|min:3|max:25',
            'description' => 'required|unique|alpha|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório',
            'title.unique' => 'O título escolhido já existe',
            'title.alpha' => 'O campo título aceita somente letras',
            'title.min' => 'O campo título tem menos de 3 caractéres',
            'title.max' => 'O campo título tem mais de 25 caractéres',

            'description.required' => 'O campo descrição é obrigatório',
            'description.unique' => 'A descrição escolhida já existe',
            'description.alpha' => 'O campo descrição aceita somente letras',
            'description.min' => 'O campo descrição tem menos de 3 caractéres',
            'description.max' => 'O campo descrição tem mais de 25 caractéres',
        ];
    }
}
