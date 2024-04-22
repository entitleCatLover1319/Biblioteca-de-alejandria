<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\CopiaLibro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['autor', 'copias'])->get();
        $libros->each(function ($libro) {
            $libro->cantidad_ejemplares = $libro->copias->count();
        });
        return view('libro.indexLibro', ['libros' => $libros]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $autores = Autor::all();
        return view('libro.createLibro', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
        ]);

        // Set text inputs to uppercase.
        $titulo = mb_strtoupper($request->titulo);
        $autor = mb_strtoupper($request->autor);

        // Retrieves record with the given input if it already exists,
        // if not create it.
        $autor = Autor::firstOrCreate(['nombre' => $autor]);

        // Create new libro instance.
        $libro = new Libro(['titulo' => $titulo]);

        $libro->autor()->associate($autor);

        // Saves instances in DB.
        $autor->save();
        $libro->save();

        return redirect()->route('copiaLibro.create', ['libro_id' => $libro->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('libro.showLibro', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        $autores = Autor::all();
        return view('libro.editLibro', compact('libro', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'autor' => 'required|max:255',
        ]);

        // Set text inputs to uppercase.
        $titulo = mb_strtoupper($request->titulo);
        $autor = mb_strtoupper($request->autor);

        // Retrieves record with the given input if it already exists,
        // if not create it.
        $autor = Autor::firstOrCreate(['nombre' => $autor]);

        $libro->titulo = $request->titulo;
        $libro->autor()->associate($autor);

        // Saves instances in DB.
        $autor->save();
        $libro->save();

        return redirect()->route('libro.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libro.index');
    }
}
