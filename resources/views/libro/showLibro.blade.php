<x-app-layout>
    <h1>{{ $libro->titulo }}</h1>
    <table class="table table-hover table-striped">
        <x-libros.tableHeader />
        <x-libros.tableRow :libro="$libro" />
    </table>
</x-app-layout>
