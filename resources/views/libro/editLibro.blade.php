<x-app-layout>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="card-header">
                        Edición de registro de libro {{ $libro->titulo }}.
                    </div>
                    <form class="needs-validation" enctype="multipart/form-data" action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <x-forms.normalInput
                            name="titulo"
                            label="Título: "
                            placeholder="Ingrese el titulo del libro"
                            required
                            maxlength="255"
                            value="{{ $libro->titulo }}"
                        />

                        <x-forms.normalInput
                            name="autor"
                            label="Autor:"
                            placeholder="Ingrese el autor"
                            maxlength="255"
                            list="autores"
                            required
                            value="{{ $libro->autor->nombre }}"
                        />
                        <div class="flex justify-center">
                            <button class="btn btn-primary" type="submit">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
