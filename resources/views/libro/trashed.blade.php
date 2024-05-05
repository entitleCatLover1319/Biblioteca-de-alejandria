<x-app-layout>
    <x-slot name="header">
        <div style="display:flex; gap:10px" class="justify-content-start align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Libros borrados.
            </h2>
            <div style="flex-grow:1">
                <x-forms.search-bar
                    action="{{ route('libro.index') }}"
                    name="search"
                    placeholder="Buscar por título, autor o ISBN"
                />
            </div>
        </div>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($libros->isEmpty())
                <h2>No se encontraron libros borrados.</h2>
            @else
                <table class="table table-hover table-striped">
                    <x-libros.tableHeaderLibroTrashed />
                    @foreach ($libros as $libro)
                        <x-libros.tableRowLibroTrashed :libro="$libro"/>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
