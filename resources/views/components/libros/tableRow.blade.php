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
    @isset($allBooks)
        <td>
            <a href="{{ route('libro.show', ['libro' => $libro->id]) }}">Ver libro</a>
        </td>
    @endisset
    @empty($allBooks)
        <td>
            <a href="{{ route('libro.edit', ['libro' => $libro->id]) }}">Editar</a>
            <form action="{{ route('libro.destroy', ['libro' => $libro->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit">Eliminar</button>
            </form>
        </td>
    @endisset
    <td>
        <x-libros.portada src="{{ asset($libro->portada) }}" />
    </td>
</tbody>
