<x-app-layout>
    <h1>{{ $libro->titulo }}</h1>
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
        <tbody>
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
            </td>
            <td>{{ $libro->cantidad_ejemplares }}</td>
            <td>
                <a href="{{ route('libro.edit', ['libro' => $libro->id]) }}">Editar</a>
                <form action="{{ route('libro.destroy', ['libro' => $libro->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">Eliminar</button>
                </form>
            </td>
            <td>
                <img src="{{ asset('storage/app/' . $libro->portada) }}">
            </td>
        </tbody>
    </table>
</x-app-layout>
