<x-app-layout>
    <h1>{{ $libro->titulo }}</h1>
    <table class="table table-hover table-striped">
        <x-libros.tableHeaderShowLibro />
        <x-libros.tableRowShowLibro :libro="$libro" />
    </table>
</x-app-layout>
