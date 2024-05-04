<tbody>
    <td>{{ $copiaLibro->editorial->nombre }}</td>
    <td>{{ $copiaLibro->edicion }}</td>
    <td>{{ $copiaLibro->ano_publicacion }}</td>
    <td>{{ $copiaLibro->isbn_13 }}</td>
    @if ($copiaLibro->isbn_10 === null)
        <td>N/A</td>
    @else
        <td>{{ $copiaLibro->isbn_10 }}</td>
    @endif
    <td>
        <x-libros.portada src="{{ asset($copiaLibro->portada) }}" />
    </td>
    <td>
        <form action="{{ route('prestamo.create') }}" method="GET">
            <input name="libro" value="{{ $copiaLibro->libro->id }}" type="hidden">
            <input name="copia" value="{{ $copiaLibro->id }}" type="hidden">
            <button class="btn btn-link" type="submit" >Solicitar préstamo.</button>
        </form>
    </td>
</tbody>
