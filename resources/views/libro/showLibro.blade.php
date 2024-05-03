<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Libro: {{ $libro->titulo }}
        </h2>
    </x-slot>
    <div class="container py-6">
        <table class="table table-hover table-striped">
            <x-libros.tableHeaderShowLibro />
            <x-libros.tableRowShowLibro :libro="$libro" />
        </table>
    </div>
    <div class="container py-1 mb5">
        <h3>Reseñas de los usuarios.</h3>
        @if (Auth::check())
            <!-- Checks if logged in user has already posted a review. If not -->
            <!-- let they post one -->
            @if (!$libro->usersReviewed()->where('user_id', Auth::id())->first())
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
            @endif
        @endif
        @if (count($reviews) === 0)
            <h4 style="margin-top:20px">No hay reseñas sobre este libro ¡Se el primero en dejar una!</h4>
        @endif
        @foreach ($reviews as $review)
            <x-reviews.reviewBlock :review="$review" />
        @endforeach
    </div>
</x-app-layout>
