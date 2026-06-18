<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCreditoRequest extends FormRequest
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
        $credito = $this->route('credito');

        return [

            'linea_credito_id' => [
                'required',
                'exists:lineas_credito,id'
            ],

            'numero_credito' => [

                'required',

                Rule::unique(
                    'creditos',
                    'numero_credito'
                )->ignore($credito)

            ],

            'fecha_otorgamiento' => [
                'required',
                'date'
            ],

            'fecha_primer_vencimiento' => [
                'nullable',
                'date'
            ],

            'monto_original' => [
                'required',
                'numeric',
                'min:0.01'
            ],

            'cantidad_cuotas' => [
                'required',
                'integer',
                'min:1'
            ],

            'tasa_interes' => [
                'required',
                'numeric',
                'min:0'
            ],

            'indice_actualizacion' => [
                'nullable'
            ],

            'estado' => [
                'required'
            ],

            'observaciones' => [
                'nullable'
            ],

            'titular_id' => [
                'required',
                'exists:personas,id'
            ]
        ];
    }
}
