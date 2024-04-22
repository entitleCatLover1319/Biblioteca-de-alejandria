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
    <td>{{ $copiaLibro->portada }}</td>
    <td>
        <a href="{{ route('libro.edit', ['libro' => $copiaLibro->libro->id]) }}">Solicitar préstamo.</a>
    </td>
</tbody>
