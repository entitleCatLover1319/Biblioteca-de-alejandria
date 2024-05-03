<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Catálogo de libros disponibles.
        </h2>
    </x-slot>
    @if ($libros->isEmpty())
        <h2>No se encuentran libros registrados.</h2>
    @else
        <table class="table table-hover table-striped">
            <x-libros.tableHeaderIndex />
            @foreach ($libros as $libro)
                <x-libros.tableRowIndex :libro="$libro"/>
            @endforeach
        </table>
    @endif
</x-app-layout>
