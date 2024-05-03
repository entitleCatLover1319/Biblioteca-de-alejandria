<?php

namespace App\Http\Controllers;

use App\Models\CopiaLibro;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CopiaLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $libro_id)
    {
        Gate::authorize('viewAny', CopiaLibro::class);
        $libro = Libro::where('id', $libro_id)->firstOrFail();
        $copias = CopiaLibro::where('libro_id', $libro->id)
            ->with('editorial')
            ->get();
        return view('copiasLibro.index', compact('copias', 'libro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $libro_id)
    {
        Gate::authorize('create', CopiaLibro::class);
        $libro = Libro::where('id', $libro_id)->firstOrFail();
        $editoriales = Editorial::all();
        return view('copiasLibro.create', compact('libro', 'editoriales'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', CopiaLibro::class);
        $request->validate([
            'isbn_13' => 'required|integer|digits:13',
            'isbn_10' => 'nullable|integer|digits:10',
            'editorial' => 'required|max:255',
            'edicion' => 'required|integer|min:1',
            'ano_publicacion' => 'required|integer|min:1800|max:2024',
            'cantidad_ejemplares' => 'required|integer|min:1',
            'portada' => 'required|mimes:jpg,png,jpeg',
        ]);

        // Set text inputs to uppercase.
        $editorial = mb_strtoupper($request->editorial);

        // Retrieves record with the given input if it already exists,
        // if not create it.
        $editorial = Editorial::firstOrCreate(['nombre' => $editorial]);

        // Gets libro instance.
        $libro = Libro::where('id', $request->libro_id)->first();

        // Store portada image.
        $image_path = $request->file('portada')->store('public/images');

        // Saves instances in DB.
        $libro->save();
        $editorial->save();

        // Create a new CopiaLibro instance and associate with
        // the Libro and Editorial instances.
        for ($i = 0; $i < $request->cantidad_ejemplares; $i++) {
            $copia_libro = new CopiaLibro([
                'isbn_13' => $request->isbn_13,
                'isbn_10' => $request->isbn_10,
                'edicion' => $request->edicion,
                'ano_publicacion' => $request->ano_publicacion,
                'portada' => $image_path,
            ]);
            $copia_libro->libro()->associate($libro);
            $copia_libro->editorial()->associate($editorial);
            $copia_libro->save();
        }

        return redirect()->route('libro.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(CopiaLibro $copiaLibro)
    {
        Gate::authorize('view', $copiaLibro);
        return view('copiasLibro.show', compact('copiaLibro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CopiaLibro $copiaLibro)
    {
        Gate::authorize('update', $copiaLibro);
        $editoriales = Editorial::all();
        return view('copiasLibro.edit', compact('copiaLibro', 'editoriales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CopiaLibro $copiaLibro)
    {
        Gate::authorize('update', $copiaLibro);
        $request->validate([
            'isbn_13' => 'required|integer|digits:13',
            'isbn_10' => 'nullable|integer|digits:10',
            'editorial' => 'required|max:255',
            'edicion' => 'required|integer|min:1',
            'ano_publicacion' => 'required|integer|min:1800|max:2024',
            'portada' => 'required|mimes:jpg,png,jpeg',
        ]);

        $copiaLibro->isbn_13 = $request->isbn_13;
        $copiaLibro->isbn_10 = $request->isbn_10;
        $copiaLibro->edicion = $request->edicion;
        $copiaLibro->ano_publicacion = $request->ano_publicacion;

        // Set text inputs to uppercase.
        $editorial = mb_strtoupper($request->editorial);

        // Retrieves record with the given input if it already exists,
        // if not create it.
        $editorial = Editorial::firstOrCreate(['nombre' => $editorial]);

        $image_path = $request->file('portada')->store('public/images');
        $copiaLibro->portada = $image_path;

        $editorial->save();

        $copiaLibro->editorial_id = $editorial->id;

        $copiaLibro->save();

        $libro_id = $copiaLibro->libro->id;
        return redirect()->route('copiaLibro.index', compact('libro_id'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CopiaLibro $copiaLibro)
    {
        Gate::authorize('delete', $copiaLibro);
        $libro_id = $copiaLibro->libro->id;
        $copiaLibro->delete();
        return redirect()->route('copiaLibro.index', compact('libro_id'));
    }
}
