<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Ejemplares de {{ $libro->titulo }}
        </h2>
    </x-slot>
    <div class="container py-6">
        @if (count($copias) === 0)
            <h2>No hay ejemplares registrados para este libro.</h2>
        @else
            <table class="table table-hover table-striped">
                <x-libros.tableHeaderIndexCopiaLibro />
                @foreach ($copias as $copia)
                    <x-libros.tableRowIndexCopiaLibro :copia="$copia" />
                @endforeach
            </table>
        @endif
    </div>
</x-app-layout>
