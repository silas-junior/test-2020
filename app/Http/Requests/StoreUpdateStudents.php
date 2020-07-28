<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateStudents extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:25',
            'email' => 'required|email|unique:students',
            'birht_date' => 'required|date_format:d/m/Y'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome contém menos de 3 caractéres',
            'name.max' => 'O campo nome contém mais de 25 caractéres',

            'email.required' => 'O campo email é obrigatório',
            'email.email' => 'O campo email não contém um email válido',
            'email.unique' => 'O email inserido já existe',

            'birth_date.required' => 'O campo data de nascimento é obirgatório',
            'birth_date.date_format' => 'A data inserida não é válida'
        ];
    }
}
