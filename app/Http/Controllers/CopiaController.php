<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\copias;
use App\Models\disponibilidad;
use App\Models\libros;
use App\Models\localidades;
use App\Models\tipo;
use Illuminate\Http\Request;

class CopiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $copias = copias::all();
        return Inertia::render('Copias/Index', ['copias'=> $copias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros = libros::all();
        $localidades = localidades::all();
        $tipos = tipo::all();
        $disponibilidad = disponibilidad::all();
        //dd($libros);
        return Inertia::render('Copias/Create', ['libros'=> $libros,'localidades'=> $localidades,'tipos'=> $tipos,'disponibilidad'=> $disponibilidad, ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate(['libro_id' => 'required']);
        $request->validate(['localidad_id' => 'required']);
        $request->validate(['tipo_id' => 'required']);
        $request->validate(['disponibilidad_id' => 'required']);
        $copias = new copias($request->input());
        $copias->save();
        return redirect('copias');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(copias $copias)
    {
        return Inertia::render('Copias/Edit', ['copias' => $copias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, copias $copias)
    {
        $request->validate(['libro_id' => 'required']);
        $request->validate(['localidad_id' => 'required']);
        $request->validate(['tipo_id' => 'required']);
        $request->validate(['disponibilidad_id' => 'required']);
        $copias->update();
        return redirect('copias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(copias $copias)
    {
        $copias->delete();
    }
}
