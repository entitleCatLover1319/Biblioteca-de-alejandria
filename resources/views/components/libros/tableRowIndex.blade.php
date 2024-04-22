<tbody>
    <td>{{ $libro->titulo }}</td>
    <td>{{ $libro->autor->nombre }}</td>
    <td>{{ $libro->cantidad_ejemplares }}</td>
    <td>
        <a href="{{ route('libro.show', ['libro' => $libro->id]) }}">Ver libro.</a>
    </td>
</tbody>

