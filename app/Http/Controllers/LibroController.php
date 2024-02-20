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
        return view('registroLibro');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $libro = new Libro;
        $libro->titulo = $request->titulo;
        $libro->isbn_13 = $request->isbn_13;
        $libro->isbn_10 = $request->isbn_10;
        $libro->autor = $request->autor;
        $libro->editorial = $request->editorial;
        $libro->edicion = $request->edicion;
        $libro->ano_publicacion = $request->ano_publicacion;
        $libro->portada = $request->portada;

        $libro->save();

        return view('registroLibro');
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
