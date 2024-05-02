<x-app-layout>
    <div class="container py-1 mb5">
        <h3>Actualiza tu reseña sobre {{ $review->libro->titulo }}.</h3>
        <form action="{{ route('review.update', ['review' => $review]) }}" method="POST">
            @csrf
            @method('PATCH')

            <x-forms.textArea
                name="review"
                label=""
                value="{{ $review->contenido }}"
            />
            <x-forms.star-rating value="{{ $review->puntaje }}"/>
            <button class="btn btn-primary" type="submit">Actualizar reseña</button><br>
        </form>
    </div>
</x-app-layout>
