<x-app-layout>
    <h1>Lista de libros registrados</h1>
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
