<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiarioRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'tipo_persona' => ['required'],

            'numero_documento' => [
                'required',
                'unique:personas,numero_documento'
            ],

            'cuit' => [
                'nullable',
                'unique:personas,cuit'
            ],

            'nombre' => ['nullable'],

            'apellido' => ['nullable'],

            'razon_social' => ['nullable'],

            'estado' => ['required']
        ];
    }
}
