<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Confirmación de prestamo.
        </h2>
    </x-slot>

    <div class="container py-6">
        <div style="display:flex" class="justify-content-center">
            <h3>El prestamo es por 14 días, con fecha tentativa de devolución: {{ $return_date }}.</h3>
        </div>
        <div style="display:flex" class="py-6 justify-content-center">
            <form action="{{ route('prestamo.store') }}"  method="POST">
                @csrf
                <input name="libro_id" value="{{ $libro_id }}" type="hidden">
                <input name="copia_libro_id" value="{{ $copia_libro_id }}" type="hidden">
                <button class="btn btn-primary" type="submit" >Confirmar prestamo</button>
            </form>
        </div>
    </div>
</x-app-layout>
