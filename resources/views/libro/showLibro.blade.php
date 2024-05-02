<x-app-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <h1>{{ $libro->titulo }}</h1>
    <table class="table table-hover table-striped">
        <x-libros.tableHeaderShowLibro />
        <x-libros.tableRowShowLibro :libro="$libro" />
    </table>
    <div class="container py-1 mb5">
        <h3>Reseñas y comentarios de los usuarios.</h3>
            @if (count($reviews) === 0)
                <h4>No hay reseñas o comentarios para este libro ¡Se el primero en dejar una!</h4>
            @endif
            <form id="reviewForm" action="{{ route('review.store') }}" method="POST">
                @csrf

                <input type="hidden" name="libro_id" value="{{ $libro->id }}">
                <x-forms.textArea
                    name="review"
                    label="Escribe un comentario o reseña del libro: "
                    placeholder=""
                />
                <x-forms.star-rating />
                <button class="btn btn-primary" type="submit">Dejar comentario</button><br>
            </form>
            @foreach ($reviews as $review)
                <x-libros.reviewBlock :review="$review" />
            @endforeach
    </div>
</x-app-layout>
