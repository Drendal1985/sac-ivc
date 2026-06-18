<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBeneficiarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $persona = $this->route('beneficiario');

        return [

            'tipo_persona' => ['required'],

            'numero_documento' => [
                'required',
                Rule::unique(
                    'personas',
                    'numero_documento'
                )->ignore($persona)
            ],

            'cuit' => [
                'nullable',
                Rule::unique(
                    'personas',
                    'cuit'
                )->ignore($persona)
            ],

            'nombre' => ['nullable'],
            'apellido' => ['nullable'],
            'razon_social' => ['nullable'],

            'estado' => ['required']
        ];
    }
}