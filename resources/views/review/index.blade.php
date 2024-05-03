<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Mis reseñas.
        </h2>
    </x-slot>
    <div class="container py-1 mb5">
        @if (count($reviews) === 0)
            <h4 style="margin-top:20px">No tienes reseñas publicadas.</h4>
        @endif
        @foreach ($reviews as $review)
            <x-reviews.reviewBlock :review="$review" :userOwnReviews="true"/>
        @endforeach
    </div>
</x-app-layout>
