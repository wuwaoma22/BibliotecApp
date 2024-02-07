<?php

namespace App\Http\Controllers;

use App\Models\category;
use Inertia\Inertia;
use App\Models\libros;
use App\Models\Renta;
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

    public function allBooks()
    {
        $request = libros::all();
        // Aplicar filtros si existen
        $query = libros::query();
        if ($request->has('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Ordenar por fecha de lanzamiento y alfabéticamente
        $query->orderBy('publication_year')->orderBy('title');

        // Paginación para optimización de respuesta
        $libros = $query->paginate(10);

        dd($libros);

        return response()->json($libros);
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = category::all();
        return Inertia::render('Libros/Create', ['categorias'=> $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate(['title' => 'required|max:100']);
        $request->validate(['author' => 'required|max:100']);
        $request->validate(['publication_year' => 'required|max:100']);
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
    public function edit(String $id)
    {
        $libros = libros::find($id);
        //dd($libros);
        $categorias = category::all();
        return Inertia::render('Libros/Edit', ['libros' => $libros, 'categorias' =>$categorias]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $libros = libros::find($id);
        //dd($request);
        $request->validate(['title' => 'required|max:100']);
        $request->validate(['author' => 'required|max:100']);
        $request->validate(['publication_year' => 'required|max:100']);
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

    public function rentar(Request $request)
    {
        
       // Valida los datos del request según sea necesario

        // Encuentra el libro por su ID
        $libro = Renta::findOrFail($request->input('libro_id'));

        // Implementa la lógica de renta del libro aquí, por ejemplo:
        $libro->estado = true;
        $libro->save();

        // Puedes devolver una respuesta JSON con un mensaje de éxito
        return response()->json(['message' => 'Libro rentado con éxito'], 200);
    }
}
