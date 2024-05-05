<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if (Auth::user()->isAdmin())
                Panel de administrador.
            @else
                Mis prestamos.
            @endif
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->isAdmin())
                <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                    <a class="btn btn-primary" href="{{ route('libro.create') }}">Registrar libro</a>
                    <a class="btn btn-primary" href="{{ route('prestamo.index') }}">Prestamos activos</a>
                    <a class="btn btn-primary" href="{{ route('libro.trashed') }}">Libros borrados</a>
                </div>
            @else
                <div>
                    @if ($prestamos->isEmpty())
                        <h2>No tienes ningún préstamo activo.</h2>
                    @else
                        @foreach ($prestamos as $prestamo)
                            <x-prestamos.prestamo-block :prestamo="$prestamo" />
                        @endforeach
                    @endif
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
