<x-app-layout>
    <h1>{{ $libro->titulo }}</h1>
    <table class="table table-hover table-striped">
        <x-libros.tableHeaderShowLibro />
        <x-libros.tableRowShowLibro :libro="$libro" />
    </table>
    <div class="container py-1 mb5">
        <h3>Reseñas de los usuarios.</h3>
        <form action="{{ route('review.store') }}" method="POST">
            @csrf

            <input type="hidden" name="libro_id" value="{{ $libro->id }}">
            <x-forms.textArea
                name="review"
                label="Escribe una reseña sobre libro: "
                placeholder=""
            />
            <x-forms.star-rating value="0"/>
            <button class="btn btn-primary" type="submit">Dejar reseña</button><br>
        </form>
        @if (count($reviews) === 0)
            <h4 style="margin-top:20px">No hay reseñas sobre este libro ¡Se el primero en dejar una!</h4>
        @endif
        @foreach ($reviews as $review)
            <x-reviews.reviewBlock :review="$review" />
        @endforeach
    </div>
</x-app-layout>
