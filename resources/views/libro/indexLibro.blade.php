<x-app-layout>
    <h1>Lista de libros registrados</h1>
    @isset($libros)
        <table class="table table-hover table-striped">
            <x-libros.tableHeader />
            @foreach ($libros as $libro)
                <x-libros.tableRow :libro="$libro" :allBooks="true"/>
            @endforeach
        </table>
    @endisset
    @empty($libros)
        <h2>No se encuentran libros registrados.</h2>
    @endisset
</x-app-layout>
