<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\libros;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = libros::all();
        return Inertia::render('Libros/Index', ['libros'=> $libros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Libros/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required|max100']);
        $request->validate(['author' => 'required|max100']);
        $request->validate(['publication_year' => 'required|max100']);
        $request->validate(['category_id' => 'required']);
        $libros = new libros($request->input());
        $libros->save();
        return redirect('libros');
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
    public function edit(libros $libros)
    {
        return Inertia::render('Libros/Edit', ['libros' => $libros]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, libros $libros)
    {
        $request->validate(['title' => 'required|max100']);
        $request->validate(['author' => 'required|max100']);
        $request->validate(['publication_year' => 'required|max100']);
        $request->validate(['category_id' => 'required']);
        $libros->update();
        return redirect('libros');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(libros $libros)
    {
        $libros->delete();
    }
}
