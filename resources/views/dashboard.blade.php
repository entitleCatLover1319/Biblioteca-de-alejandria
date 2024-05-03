<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Aquí van los prestamos realizados.
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <!-- <x-welcome /> -->
                <a href="{{ route('libro.index') }}">Ver libros.</a>
                <a href="{{ route('libro.create') }}">Registrar libro.</a>
            </div>
        </div>
    </div>
</x-app-layout>
