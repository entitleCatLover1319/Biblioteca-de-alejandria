<form action="{{$action}}" method="GET">
    <div style="display:flex" class="justify-content-start">
        <button class="btn btn-primary" type="submit">
            <i class="fa fa-search" style="font-size: 18px;"></i>
        </button>
        <input
            name="{{$name}}"
            class="form-control"
            placeholder="{{$placeholder}}"
        >
    </div>
</form>
