@props(['href', 'active', 'class' => 'btn btn-secondary'])

@php
$styles = ($active ?? false)
            ? 'background-color: #f7f3e7;color: #212529;'
            : '';
@endphp

<li class="nav-item">
    <a class="btn btn-outline-light" {{ $attributes->merge(['style' => $styles]) }} href="{{ $href }}" >
        {{ $slot }}
    </a>
</li>
