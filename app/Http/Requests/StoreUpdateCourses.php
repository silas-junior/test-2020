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
            'title' => 'required|unique:courses|min:3|max:25',
            'description' => 'required|unique:courses|min:10|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'O campo título é obrigatório',
            'title.unique' => 'O título inserido já existe',
            'title.min' => 'O campo título tem menos de 3 caractéres',
            'title.max' => 'O campo título tem mais de 25 caractéres',

            'description.required' => 'O campo descrição é obrigatório',
            'description.unique' => 'A descrição inserido já existe',
            'description.min' => 'O campo descrição tem menos de 10 caractéres',
            'description.max' => 'O campo descrição tem mais de 25 caractéres',
        ];
    }
}
