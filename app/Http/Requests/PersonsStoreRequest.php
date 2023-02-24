<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'apellido' => 'required',
            'telefono' => 'required|unique:persons,telefono',
            'sexo' => 'required',
            'ciudad' => 'required',
            'cinro' => 'required|unique:persons,cinro'
        ];
    }

    public function messages(){
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'telefono.required' => 'El campo telefono es obligatorio',
            'telefono.unique' => 'El telefono ya existe',
            'sexo.required' => 'El campo sexo es obligatorio',
            'ciudad.required' => 'El campo ciudad es obligatorio',
            'cinro.required' => 'El N° de cédula es obligatorio',
            'cinro.unique' => 'El N° de cédula ya existe'
        ];
    }

}
