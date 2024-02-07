<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = category::all();
        //dd($categorias);
        return Inertia::render('Categories/Index', ['categorias'=> $categorias]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Categories/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|max:100']);
        $request->validate(['description' => 'required|max:100']);
        $categorias = new category($request->input());
        $categorias->save();
        return redirect('categorias');
    }

    /**
     * Display the specified resource.
     */
    public function show(category $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        //dd($id);
        $categorias = category::find($id);
        return Inertia::render('Categories/Edit', ['categorias'=> $categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $categorias = category::find($id);
        //dd($categorias);
        $request->validate(['name' => 'required']);
        $request->validate(['description' => 'required']);
        $categorias->update();
        return redirect('categorias');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $categorias = category::find($id);
        $categorias->delete();
    }
}
