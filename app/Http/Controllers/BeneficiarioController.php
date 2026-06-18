<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBeneficiarioRequest;
use App\Http\Requests\UpdateBeneficiarioRequest;
use App\Models\Persona;

class BeneficiarioController extends Controller
{

    public function __construct()
    {
        $this->middleware(
            'permission:beneficiarios.ver'
        )->only([
            'index',
            'show'
        ]);

        $this->middleware(
            'permission:beneficiarios.crear'
        )->only([
            'create',
            'store'
        ]);

        $this->middleware(
            'permission:beneficiarios.editar'
        )->only([
            'edit',
            'update'
        ]);

        $this->middleware(
            'permission:beneficiarios.eliminar'
        )->only([
            'destroy'
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Persona::query();

        if ($request->filled('buscar')) {

            $texto = $request->buscar;

            $query->where(function ($q) use ($texto) {

                $q->where('numero_documento', 'ILIKE', "%{$texto}%")
                ->orWhere('apellido', 'ILIKE', "%{$texto}%")
                ->orWhere('nombre', 'ILIKE', "%{$texto}%")
                ->orWhere('cuit', 'ILIKE', "%{$texto}%");

            });
        }

        if ($request->filled('estado')) {

            $query->where(
                'estado',
                $request->estado
            );

        }

        if ($request->filled('tipo_persona')) {

            $query->where(
                'tipo_persona',
                $request->tipo_persona
            );

        }

        $beneficiarios = $query
            ->orderBy('id', 'desc')
            ->paginate(20)
            ->withQueryString();

        return view(
            'beneficiarios.index',
            compact('beneficiarios')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beneficiarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBeneficiarioRequest $request)
    {
        Persona::create(
            $request->validated()
        );

        return redirect()
            ->route('beneficiarios.index')
            ->with(
                'success',
                'Beneficiario creado correctamente'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $beneficiario = Persona::findOrFail($id);

        return view(
            'beneficiarios.show',
            compact('beneficiario')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $beneficiario = Persona::findOrFail($id);

        return view(
            'beneficiarios.edit',
            compact('beneficiario')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
    UpdateBeneficiarioRequest $request,string $id)
    {
        $beneficiario = Persona::findOrFail($id);

        $beneficiario->update(
            $request->validated()
        );

        return redirect()
            ->route('beneficiarios.index')
            ->with(
                'success',
                'Beneficiario actualizado correctamente'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beneficiario = Persona::findOrFail($id);

        $beneficiario->delete();

        return redirect()
            ->route('beneficiarios.index')
            ->with(
                'success',
                'Beneficiario eliminado correctamente'
            );
    }
}
