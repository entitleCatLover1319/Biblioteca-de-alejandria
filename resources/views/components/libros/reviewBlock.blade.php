<div style="margin:10px">
    <div class="card">
      <div class="card-header">
        <span style="margin:10px">{{ $review->user->name }}.</span>
        <span style="margin:10px"><b>Calificación: {{ $review->puntaje }}/5</b></span>
        <span style="margin:10px">
            @for ($i = 0; $i < $review->puntaje; $i++)
                <span class="fa fa-star" style="color:orange"></span>
            @endfor
            @for ($i = $review->puntaje; $i < 5; $i++)
                <span class="fa fa-star"></span>
            @endfor
        </span>
      </div>
      <div class="card-body">
        <blockquote class="card-blockquote">
          <p class="lead">{{ $review->contenido }}</p>
        </blockquote>
      </div>
    </div>
</div>
