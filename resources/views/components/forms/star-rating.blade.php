<div class="form-group">
    <div class="flex">
        <label for="puntaje" class="form-label">Calificación: </label>
    </div>
    <div class="rating">
        <input type="hidden" name="puntaje" id="puntaje" value="{{old('puntaje') ?? $value}}">
        @for ($i = 1; $i <= 5; $i++)
            @if ($i <= $value)
            <span class="fa fa-star star active" data-rating="{{ $i }}"></span>
            @else
            <span class="fa fa-star star" data-rating="{{ $i }}"></span>
            @endif
        @endfor
    </div>
    @error('puntaje')
        <div class="alert alert-danger"><small>{{$message}}</small></div>
    @enderror

<style>
    .rating {
      display: inline-block;
      font-size: 24px;
    }

    .star {
      cursor: pointer;
    }

    .star:hover,
    .star.active {
      color: orange;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var stars = document.querySelectorAll('.fa-star');
      var ratingInput = document.getElementById('puntaje');

      stars.forEach(function(star) {
        star.addEventListener('click', function() {
          var rating = this.getAttribute('data-rating');
          ratingInput.value = rating;
          stars.forEach(function(s) {
            if (parseInt(s.getAttribute('data-rating')) <= parseInt(rating)) {
              s.classList.add('active');
            } else {
              s.classList.remove('active');
            }
          });
        });
      });
    });
</script>

</div>
