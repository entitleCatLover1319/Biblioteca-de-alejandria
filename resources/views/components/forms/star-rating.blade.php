<div class="form-group">
    <div class="flex">
        <label for="puntaje" class="form-label">Calificación: </label>
    </div>
    <div class="rating">
        <input type="hidden" name="puntaje" id="puntaje" value="{{old('puntaje') ?? 0}}">
        <span class="fa fa-star star" data-rating="1"></span>
        <span class="fa fa-star star" data-rating="2"></span>
        <span class="fa fa-star star" data-rating="3"></span>
        <span class="fa fa-star star" data-rating="4"></span>
        <span class="fa fa-star star" data-rating="5"></span>
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
