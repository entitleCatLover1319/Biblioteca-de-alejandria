<div class="form-group">
    <div class="flex">
        <label for="{{$name}}" class="form-label">{{$label}} </label>

        @isset($attributes['required'])
            <span class="text-red-500 text-right"> * </span>
        @endisset

    </div>
    <div class="mt-2">
        <input type="{{$type}}" name="{{$name}}" id="{{$name}}" value="{{old($name) ?? $value}}" {{$attributes}} placeholder="{{$placeholder}}" class="form-control">
    </div>
    @error($name)
        <div class="alert alert-danger"><small>{{$message}}</small></div>
    @enderror

</div>
