<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlummnoRequest extends FormRequest
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
            'nombres' => 'required',
            'apaterno' => 'required',
            'amaterno' => 'required',
            'tipodoc' => 'required',
            'nrodoc' => 'required',
            'correo' => 'required',
            'celular' => 'required',
            'sexo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'No has ingresado el nombre.',
            'apaterno.required' => 'No has ingresado el apellido paterno.',
            'amaterno.required' => 'No has ingresado el apellido materno.',
            'tipodoc.required' => 'No has ingresado el tipo de documento.',
            'nrodoc.required' => 'No has ingresado el número de documento.',
            'correo.required' => 'No has ingresado el correo.',
            'celular.required' => 'No has ingresado el celuar.',
            'sexo.required' => 'No has ingresado el sexo.',
        ];
    }
}
