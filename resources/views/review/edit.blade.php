<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edita tu reseña sobre {{ $review->libro->titulo }}
        </h2>
    </x-slot>
    <div class="container">
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
