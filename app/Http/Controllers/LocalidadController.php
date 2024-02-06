<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\localidades;
use Illuminate\Http\Request;

class LocalidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $localidades = localidades::all();
        return Inertia::render('Localidades/Index', ['localidades'=> $localidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Localidades/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $request->validate(['direction' => 'required']);
        $request->validate(['telephone' => 'required']);
        $localidades = new localidades($request->input());
        $localidades->update();
        return redirect('localidades');
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
    public function edit(localidades $localidades)
    {
        return Inertia::render('Localidad/Edit', ['localidades' => $localidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, localidades $localidades)
    {
        $request->validate(['name' => 'required']);
        $request->validate(['direction' => 'required']);
        $request->validate(['telephone' => 'required']);
        $localidades->update();
        return redirect('localidades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(localidades $localidades)
    {
        $localidades->delete();
    }
}
