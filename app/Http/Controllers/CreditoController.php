<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Credito;
use App\Models\Persona;
use App\Models\LineaCredito;

use App\Http\Requests\StoreCreditoRequest;
use App\Http\Requests\UpdateCreditoRequest;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $creditos = Credito::with([
            'lineaCredito',
            'personas'
        ])
        ->orderBy('id', 'desc')
        ->paginate(20);

        return view(
            'creditos.index',
            compact('creditos')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lineasCredito = LineaCredito::where(
            'activa',
            true
        )
        ->orderBy('nombre')
        ->get();

        $beneficiarios = Persona::where(
            'estado',
            'ACTIVO'
        )
        ->orderBy('apellido')
        ->orderBy('nombre')
        ->get();

        return view(
            'creditos.create',
            compact(
                'lineasCredito',
                'beneficiarios'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreCreditoRequest $request
    )
    {
        $credito = Credito::create([

            'linea_credito_id' =>
                $request->linea_credito_id,

            'numero_credito' =>
                $request->numero_credito,

            'fecha_otorgamiento' =>
                $request->fecha_otorgamiento,

            'fecha_primer_vencimiento' =>
                $request->fecha_primer_vencimiento,

            'monto_original' =>
                $request->monto_original,

            'saldo_capital' =>
                $request->monto_original,

            'cantidad_cuotas' =>
                $request->cantidad_cuotas,

            'tasa_interes' =>
                $request->tasa_interes,

            'indice_actualizacion' =>
                $request->indice_actualizacion,

            'estado' =>
                $request->estado,

            'observaciones' =>
                $request->observaciones
        ]);

        /*
        * Titular
        */

        $credito->personas()->attach(
            $request->titular_id,
            [
                'rol' => 'TITULAR'
            ]
        );

        return redirect()
            ->route('creditos.index')
            ->with(
                'success',
                'Crédito creado correctamente'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $credito = Credito::with([
            'lineaCredito',
            'personas'
        ])->findOrFail($id);

        return view(
            'creditos.show',
            compact('credito')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $credito = Credito::with('personas')
            ->findOrFail($id);

        $lineasCredito = LineaCredito::where(
            'activa',
            true
        )
        ->orderBy('nombre')
        ->get();

        $beneficiarios = Persona::where(
            'estado',
            'ACTIVO'
        )
        ->orderBy('apellido')
        ->orderBy('nombre')
        ->get();

        return view(
            'creditos.edit',
            compact(
                'credito',
                'lineasCredito',
                'beneficiarios'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
    UpdateCreditoRequest $request,
        string $id
    )
    {
        $credito = Credito::findOrFail($id);

        $credito->update([

            'linea_credito_id' =>
                $request->linea_credito_id,

            'numero_credito' =>
                $request->numero_credito,

            'fecha_otorgamiento' =>
                $request->fecha_otorgamiento,

            'fecha_primer_vencimiento' =>
                $request->fecha_primer_vencimiento,

            'monto_original' =>
                $request->monto_original,

            'cantidad_cuotas' =>
                $request->cantidad_cuotas,

            'tasa_interes' =>
                $request->tasa_interes,

            //'indice_actualizacion' =>
            //    $request->indice_actualizacion,

            'estado' =>
                $request->estado,

            'observaciones' =>
                $request->observaciones,
        ]);

        /*
        * Actualizar titular
        */

        $credito->personas()
            ->wherePivot(
                'rol',
                'TITULAR'
            )
            ->detach();

        $credito->personas()->attach(
            $request->titular_id,
            [
                'rol' => 'TITULAR'
            ]
        );

        return redirect()
            ->route('creditos.index')
            ->with(
                'success',
                'Crédito actualizado correctamente'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
