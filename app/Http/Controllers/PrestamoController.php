<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\User;
use App\Models\CopiaLibro;
use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\BorrowStartNotification;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('viewAny', Prestamo::class);

        if (request()->has('search')) {
            $search = request()->input('search');
            // Looks up for users with name like $search and retrieves the ids.
            $users_id = User::where('name', 'like', '%' . $search . '%')->pluck('id');
            // Looks up for copiaLibro that have isbn 13 or 10 like $search and retrieves
            // the ids.
            $copias_libro_id = CopiaLibro::where('isbn_13', 'like', $search . '%')
                ->orWhere('isbn_10', 'like', $search . '%')
                ->pluck('id');
            // Looks up for autores with nombre like $search and retrieves the ids.
            $autores_id = Autor::where('nombre', 'like', '%' . $search . '%')->pluck('id');
            // Looks up for libros where titulo is like $search or is related with an
            // author found in $autores_id, and retrieves the ids.
            $libros_id = Libro::where('titulo', 'like', '%' . $search . '%')
                ->orWhereIn('autor_id', $autores_id->toArray())
                ->pluck('id');
            // Finally, looks up for prestamos that are related to users fond, copiaLibro
            // found or libro found in the previous queries, and retrieves everything.
            $prestamos = Prestamo::whereIn('user_id', $users_id->toArray())
                ->orWhereIn('copia_libro_id', $copias_libro_id->toArray())
                ->orWhereIn('libro_id', $libros_id->toArray())
                ->get();
        }
        else {
            $prestamos = Prestamo::with(['libro', 'copiaLibro', 'user'])->get();
        }

        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $return_date = Carbon::now()->addDays(15)->format('Y-m-d');
        $libro_id = request()->input('libro');
        $copia_libro_id = request()->input('copia');
        return view('prestamos.create', compact('return_date', 'libro_id', 'copia_libro_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'exists:libro,id',
            'copia_libro_id' => 'exists:copia_libro,id',
        ]);

        $prestamo = Prestamo::create([
            'user_id' => Auth::id(),
            'libro_id' => $request->libro_id,
            'copia_libro_id' => $request->copia_libro_id,
            'fecha_devolucion' => Carbon::now()->addDays(15),
            'dias_atraso' => 0,
        ]);

        Mail::to($request->user())->send(new BorrowStartNotification($prestamo));
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        Gate::authorize('view', $prestamo);
        return redirect()->route('prestamo.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        Gate::authorize('update', $prestamo);
        return redirect()->route('prestamo.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        Gate::authorize('update', $prestamo);
        return redirect()->route('prestamo.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        Gate::authorize('delete', $prestamo);
        $prestamo->delete();
        return redirect()->route('prestamo.index');
    }
}
