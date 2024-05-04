<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; gap:10px" class="justify-content-start align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Prestamos de la biblioteca.
            </h2>
            <div style="flex-grow:1">
                <x-forms.search-bar
                    action="{{ route('prestamo.index') }}"
                    name="search"
                    placeholder="Buscar usuario, titulo, autor, o ISBN"
                />
            </div>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($prestamos->isEmpty())
                <h2>No hay prestamos actualmente.</h2>
            @else
                @foreach ($prestamos as $prestamo)
                    <x-prestamos.prestamo-block :prestamo="$prestamo" />
                @endforeach
            @endif
        </div>
    </div>
</x-app-layout>
