<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\CopiaLibro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->has('search')) {
            $search = request()->input('search');
            // Looks for autores with name like $search and retrieves only the id.
            $autores_id = Autor::where('nombre', 'like', '%' . $search . '%')->pluck('id');
            // Looks for distinct copiaLibro with isbn (13 or 10) like $search and retrieves
            // the libro_id.
            $copias_libro_fk = CopiaLibro::where('isbn_13', 'like', $search . '%')
                ->orWhere('isbn_10', 'like', $search . '%')
                ->distinct('libro_id')
                ->pluck('libro_id');
            // Looks for libr with titulo like $search or autor id in autores_id or
            // id in copias_libro_fk.
            $libros = Libro::where('titulo', 'like', '%' . $search . '%')
                ->orWhereIn('autor_id', $autores_id->toArray())
                ->orWhereIn('id', $copias_libro_fk->toArray())
                ->with(['autor', 'copias'])
                ->get();
        }
        else {
            $libros = Libro::with(['autor', 'copias'])->get();
        }

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
        Gate::authorize('create', Libro::class);

        $autores = Autor::all();
        return view('libro.createLibro', compact('autores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gate::authorize('create', Libro::class);

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
        $reviews = $libro->reviews()->with('user')->get();
        return view('libro.showLibro', compact('libro', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        Gate::authorize('update', $libro);
        $autores = Autor::all();
        return view('libro.editLibro', compact('libro', 'autores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        Gate::authorize('update', $libro);
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
        Gate::authorize('delete', $libro);

        // borrar todo lo relacionado a esta cocha
        $copias = $libro->copias;
        foreach ($copias as $copia) {
            $copia->delete();
        }
        $reviews = $libro->reviews;
        foreach ($reviews as $review) {
            $review->delete();
        }
        $prestamos = $libro->prestamos;
        foreach ($prestamos as $prestamo) {
            $prestamo->delete();
        }
        $libro->delete();
        return redirect()->route('libro.index');
    }

    public function trashed()
    {
        Gate::authorize('restore', Libro::class);
        $libros = Libro::withTrashed()->whereNotNull('deleted_at')->with('autor')->get();
        return view('libro.trashed', compact('libros'));
    }

    public function restore(string $libro_id)
    {
        Gate::authorize('restore', Libro::class);
        $libro = Libro::withTrashed()->find($libro_id);
        $copias = $libro->copias()->withTrashed()->get();
        foreach ($copias as $copia) {
            $copia->restore();
        }
        $reviews = $libro->reviews()->withTrashed()->get();
        foreach ($reviews as $review) {
            $review->restore();
        }
        $prestamos = $libro->prestamos()->withTrashed()->get();
        foreach ($prestamos as $prestamo) {
            $prestamo->restore();
        }
        $libro->restore();
        return redirect()->route('libro.trashed');
    }

    public function forceDelete(string $libro_id)
    {
        Gate::authorize('forceDelete', Libro::class);
        $libro = Libro::withTrashed()->find($libro_id);
        $copias = $libro->copias()->withTrashed()->get();
        $portadas = array();
        foreach ($copias as $copia) {
            // Checks if the copies have different portadas
            if (!in_array($copia->portada, $portadas)) {
                $portadas[] = $copia->portada;
            }
            $copia->forceDelete();
        }
        // Delete every portada found
        foreach ($portadas as $portada) {
            Storage::delete($portada);
        }
        $reviews = $libro->reviews()->withTrashed()->get();
        foreach ($reviews as $review) {
            $review->forceDelete();
        }
        $prestamos = $libro->prestamos()->withTrashed()->get();
        foreach ($prestamos as $prestamo) {
            $prestamo->forceDelete();
        }
        $libro->forceDelete();
        return redirect()->route('libro.trashed');
    }
}
