<x-app-layout>
    <div class="container py-1 mb5">
        @if (count($reviews) === 0)
            <h4 style="margin-top:20px">No tienes reseñas publicadas.</h4>
        @endif
        @foreach ($reviews as $review)
            <x-reviews.reviewBlock :review="$review" :userOwnReviews="true"/>
        @endforeach
    </div>
</x-app-layout>
