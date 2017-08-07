<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateMangaRequest extends FormRequest
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
            'name' => ['required','max:160']
        ];
    }

    public function messages()
    {
        return [
            'message.required' => 'Escribe el nombre',
            'message.max'=>'El nombre no puede superar los 160 caracteres'
        ];
    }
}
