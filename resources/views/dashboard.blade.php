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
                    <a href="{{ route('prestamo.index') }}">Ver prestamos de usuarios.</a>
                    <a href="{{ route('libro.create') }}">Registrar libro.</a>
                </div>
            @endif
            <div>
                @foreach ($prestamos as $prestamo)
                    <x-prestamos.prestamo-block :prestamo="$prestamo" />
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
