<div style="margin:10px">
    <div class="card">
        <div class="card-header" style="display: flex; justify-content:space-between; align-items: center; gap:10px;">
            <div>
                @can('delete', $prestamo)
                    Usuario: {{ $prestamo->user->name }}
                @else
                    {{ $prestamo->libro->titulo }}
                @endcan
            </div>
            <div>
                <span style="margin-right:10px">
                    Fecha de devolución: {{ $prestamo->fecha_devolucion }}
                </span>
                @if ($prestamo->dias_atraso > 0)
                    Días atraso: <span style="color:red">{{ $prestamo->dias_atraso }}</span>
                @else
                    Días restantes: {{ now()->diff($prestamo->fecha_devolucion)->days }}
                @endif
                @canany(['delete', 'forceDelete'], $prestamo)
                    <form style="margin-left:10px; display:inline" action="{{ route('prestamo.destroy', ['prestamo' => $prestamo]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Eliminar prestamo</button>
                    </form>
                @endcanany
            </div>
        </div>
        <div class="card-body">
            <blockquote class="card-blockquote">
                <p>
                    <span style="margin-right:10px">Libro: {{ $prestamo->libro->titulo }}</span>
                    Autor: {{ $prestamo->libro->autor->nombre }}
                </p>
                <p>
                    <span style="margin-right:10px">ISBN: {{ $prestamo->copiaLibro->isbn_13 }}</span>
                    ISBN (10): {{ $prestamo->copiaLibro->isbn_10 === null ? 'N/A' : $prestamo->copiaLibro->isbn_10 }}
                </p>
                <p>
                    <footer>
                        <cite>
                            Fecha de solicitud: {{ $prestamo->created_at->format('Y-m-d') }}
                        </cite>
                    </footer>
                </p>
            </blockquote>
        </div>
    </div>
</div>
