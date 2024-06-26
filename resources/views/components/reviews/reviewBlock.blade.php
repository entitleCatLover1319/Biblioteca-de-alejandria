<div style="margin:10px">
    <div class="card">
      <div class="card-header" style="display: flex; justify-content:space-between; align-items: center; gap:10px;">
        <div>
            @isset($userOwnReviews)
                <span style="margin-right:10px">Libro:
                    <a href="{{ route('libro.show', ['libro' => $review->libro->id]) }}">{{ $review->libro->titulo }}</a>
                </span>
            @else
                <span style="margin-right:10px">{{ $review->user->name }}.</span>
            @endisset
            <span style="margin-right:10px"><b>Calificación: {{ $review->puntaje }}/5</b></span>
            <span style="margin-right:10px">
                @for ($i = 0; $i < $review->puntaje; $i++)
                    <span class="fa fa-star" style="color:orange"></span>
                @endfor
                @for ($i = $review->puntaje; $i < 5; $i++)
                    <span class="fa fa-star"></span>
                @endfor
            </span>
        </div>
            <div style="float:right">
            @can('update', $review)
                <a style="margin-right:10px" href="{{ route('review.edit', ['review' => $review]) }}">Editar reseña</a>
            @endcan
            @canany(['delete', 'forceDelete'], $review)
                <form style="display:inline" action="{{ route('review.destroy', ['review' => $review]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Eliminar reseña</button>
                </form>
            @endcanany
            </div>
      </div>
      <div class="card-body">
        <blockquote class="card-blockquote">
          <p class="lead">{{ $review->contenido }}</p>
          <footer>
              Publicado en
              <cite>{{ $review->created_at->format('Y-m-d') }}.</cite>
              @if (!$review->created_at->is($review->updated_at))
                  <span style="margin-left:10px">Actualizado por última vez en <cite>{{ $review->updated_at->format('Y-m-d') }}</cite></span>
              @endif
          </footer>
        </blockquote>
      </div>
    </div>
</div>
