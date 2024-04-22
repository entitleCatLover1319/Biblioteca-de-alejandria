<x-app-layout>
    <h1>Ejemplares de {{ $libro->titulo }}</h1>
    <table class="table table-hover table-striped">
        <x-libros.tableHeaderIndexCopiaLibro />
        @foreach ($copias as $copia)
            <x-libros.tableRowIndexCopiaLibro :copia="$copia" />
        @endforeach
    </table>
</x-app-layout>
