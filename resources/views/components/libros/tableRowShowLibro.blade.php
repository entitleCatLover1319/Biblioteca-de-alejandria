<tbody>
    <td>{{ $libro->titulo }}</td>
    <td>{{ $libro->autor->nombre }}</td>
    <td>
        <a href="{{ route('copiaLibro.index', ['libro_id' => $libro->id]) }}">Ver ejemplares.</a>
        @can('create', App\Models\Libro::class)
            <a href="{{ route('copiaLibro.create', ['libro_id' => $libro->id]) }}">Agregar ejemplares.</a>
        @endcan
        @can('update', $libro)
            <a href="{{ route('libro.edit', ['libro' => $libro->id]) }}">Editar registro.</a>
        @endcan
        @canany(['delete', 'forceDelete'], $libro)
            <form style="display:inline" action="{{ route('libro.destroy', ['libro' => $libro->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Eliminar libro.</button>
            </form>
        @endcanany
    </td>
</tbody>
