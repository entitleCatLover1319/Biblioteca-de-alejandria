<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libro.createLibro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'isbn_13' => 'required|integer|digits:13',
            'isbn_10' => 'nullable|integer|digits:10',
            'autor' => 'required|max:100',
            'editorial' => 'required|max:100',
            'edicion' => 'required',
            'ano_publicacion' => 'required',
            'cantidad_ejemplares' => 'required|integer|min:1',
            'portada' => 'required|mimes:jpg,png,jpeg',
        ]);

        $libro = new Libro;
        $libro->titulo = $request->titulo;
        $libro->isbn_13 = $request->isbn_13;
        $libro->isbn_10 = $request->isbn_10;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->edicion = $request->edicion;
        $libro->ano_publicacion = $request->ano_publicacion;
        $libro->cantidad_ejemplares = $request->cantidad_ejemplares;
        $image_path = $request->file('portada')->store('public/images');
        $libro->portada = $image_path;

        $libro->save();

        return view('libro.indexLibro', ['libros' => Libro::all()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('welcome');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        return view('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        return view('welcome');
    }
}
