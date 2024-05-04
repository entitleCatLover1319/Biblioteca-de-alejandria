<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Confirmación de prestamo.
        </h2>
    </x-slot>

    <div class="container py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card-header" style="display: flex; justify-content:space-between; align-items: center; gap:10px;">
                    Prestamo de {{ App\Models\Libro::where('id', $libro_id)->first()->titulo }}.
                </div>
                <div class="card-body">
                    <p>
                        Usted está por solicitar el préstamo del libro {{ App\Models\Libro::where('id', $libro_id)->first()->titulo }}.
                        <br>
                        El préstamo es por <b>14 días</b>, con fecha de devolución: <b>{{ $return_date }}</b>.
                    </p>
                </div>
            </div>
        </div>
        <div style="display:flex" class="py-6 justify-content-center">
            <form action="{{ route('prestamo.store') }}"  method="POST">
                @csrf
                <input name="libro_id" value="{{ $libro_id }}" type="hidden">
                <input name="copia_libro_id" value="{{ $copia_libro_id }}" type="hidden">
                <button class="btn btn-primary" type="submit" >Confirmar prestamo</button>
            </form>
        </div>
    </div>
</x-app-layout>
