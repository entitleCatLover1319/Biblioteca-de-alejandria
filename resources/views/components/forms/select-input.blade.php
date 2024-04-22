<div class="form-group">

    <div class="flex">
        <label for={{$name}} class="form-label">{{$label}}</label>

        @isset($attributes['required'])
                <span class="text-red-500 text-right"> * </span>
        @endisset

    </div>

    <div class="mt-2">
      <select id={{$name}} name={{$name}} {{ $attributes }}class="form-control">
        @foreach ($options as $key => $value)
            <option value="{{ $key }}" @if ($key == old($name) or $key == $selected)
                selected
            @endif>
                {{ $value }}
            </option>
        @endforeach
      </select>

        @error($name)
            <h5 class="text-red-500">{{$message}}</h5>
        @enderror

    </div>
</div>
