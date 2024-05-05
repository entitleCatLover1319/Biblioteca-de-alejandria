<tbody>
    <td>{{ $libro->titulo }}</td>
    <td>{{ $libro->autor->nombre }}</td>
    <td>{{ $libro->deleted_at->format('Y-m-d') }}</td>
    <td>
        <div style="display:flex; gap:10px" class="justify-content-center">
            <form action="{{ route('libro.restore', ['libro_id' => $libro]) }}" method="POST">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-secondary" >Restaurar libro</button>
            </form>
            <form action="{{ route('libro.forceDelete', ['libro_id' => $libro]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" >Elimación definitiva</button>
            </form>
        </div>
    </td>
</tbody>

