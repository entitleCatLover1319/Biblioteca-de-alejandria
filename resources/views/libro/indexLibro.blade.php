<x-app-layout>
    <h1>Lista de libros registrados</h1>
    @isset($libros)
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Editorial</th>
                <th>Edición</th>
                <th>Año publicación</th>
                <th>ISBN 13</th>
                <th>ISBN 10</th>
                <th>Cantidad de ejemplares</th>
                <th>Acciones</th>
                <th>Portada</th>
            </tr>
        </thead>
        @foreach ($libros as $libro)
        <tr>
            <td>{{ $libro->titulo }}</td>
            <td>{{ $libro->autor }}</td>
            <td>{{ $libro->editorial }}</td>
            <td>{{ $libro->edicion }}</td>
            <td>{{ $libro->ano_publicacion }}</td>
            <td>{{ $libro->isbn_13 }}</td>
            <td>
            @if (isset($libro->isbn_10))
                {{ $libro->isbn_10 }}
            @else
                N/A
            @endif
            <td>{{ $libro->cantidad_ejemplares }}</td>
            </td>
            <td>
                <a href="{{ route('libro.show', ['libro' => $libro->id]) }}">Ver libro</a>
            </td>
            <td>
                <img src="{{ asset('storage/app/' . $libro->portada) }}">
            </td>
        </tr>
        @endforeach
    </table>
    @endisset
</x-app-layout>
