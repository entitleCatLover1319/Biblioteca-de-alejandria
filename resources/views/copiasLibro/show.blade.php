<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ejemplar de {{ $copiaLibro->libro->titulo }}
        </h2>
    </x-slot>
    <div class="container py-6">
        <table class="table table-hover table-striped">
            <x-libros.tableHeaderShowCopiaLibro />
            <x-libros.tableRowShowCopiaLibro :copiaLibro="$copiaLibro"/>
        </table>
    </div>
</x-app-layout>
