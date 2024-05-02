<tbody>
    <td>{{ $copia->editorial->nombre }}</td>
    <td>{{ $copia->edicion }}</td>
    <td>{{ $copia->ano_publicacion }}</td>
    <td>{{ $copia->isbn_13 }}</td>
    <td>
    @if (isset($copia->isbn_10))
        {{ $copia->isbn_10 }}
    @else
        N/A
    @endif
    </td>
    <td>
        <x-libros.portada src="{{ asset($copia->portada) }}" />
    </td>
    <td>
        <a href="{{ route('copiaLibro.show', ['copiaLibro' => $copia->id]) }}">Ver ejemplar.</a>
        <a href="{{ route('copiaLibro.edit', ['copiaLibro' => $copia->id]) }}">Editar ejemplar.</a>
        <form style="display:inline" action="{{ route('copiaLibro.update', ['copiaLibro' => $copia->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-link" type="submit">Eliminar ejemplar.</button>
        </form>
    </td>
</tbody>
