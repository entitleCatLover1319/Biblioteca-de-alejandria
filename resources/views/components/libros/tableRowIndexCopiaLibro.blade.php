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
        <div style="display:flex; gap:10px" class="justify-content-center align-items-center">
            @if ($copia->prestamo == null)
                <form action="{{ route('prestamo.create') }}" method="GET">
                    <input name="libro" value="{{ $copia->libro->id }}" type="hidden">
                    <input name="copia" value="{{ $copia->id }}" type="hidden">
                    <button class="btn btn-link" type="submit" >Solicitar préstamo.</button>
                </form>
            @else
                <span style="color:red">Copia en prestamo.</span>
            @endif
            @can('update', $copia)
                <a  href="{{ route('copiaLibro.edit', ['copiaLibro' => $copia->id]) }}">Editar ejemplar.</a>
            @endcan
        </div>
        <div style="display:flex" class="justify-content-center">
            @can(['delete', 'forceDelete'], $copia)
                <form action="{{ route('copiaLibro.destroy', ['copiaLibro' => $copia->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar ejemplar.</button>
                </form>
            @endcan
        </div>
    </td>
</tbody>
