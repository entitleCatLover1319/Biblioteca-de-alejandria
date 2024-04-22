<x-app-layout>
    <h1>Ejemplar número {{ $copiaLibro->id }} de {{ $copiaLibro->libro->titulo }}</h1>
    <table class="table table-hover table-striped">
        <x-libros.tableHeaderShowCopiaLibro />
        <x-libros.tableRowShowCopiaLibro :copiaLibro="$copiaLibro"/>
    </table>
</x-app-layout>
