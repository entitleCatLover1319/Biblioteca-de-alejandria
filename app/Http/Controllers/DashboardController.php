<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Prestamo;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function load() {
        $prestamos = Prestamo::where('user_id', Auth::id())
            ->with(['libro', 'copiaLibro'])->get();
        return view('dashboard', compact('prestamos'));
    }
}
