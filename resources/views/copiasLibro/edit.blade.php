<x-app-layout>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="card-header">
                        Actualizar registro de copia con ID {{ $copiaLibro->id }} de {{ $copiaLibro->libro->titulo }}.
                    </div>
                    <form class="needs-validation" enctype="multipart/form-data" action="{{ route('copiaLibro.update', ['copiaLibro' => $copiaLibro->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <x-forms.normalInput
                            name="editorial"
                            label="Editorial:"
                            placeholder="Ingrese la editorial"
                            maxlength="255"
                            list="editoriales"
                            required
                            value="{{ $copiaLibro->editorial->nombre }}"
                        />

                        <div class="grid md:grid-cols-2 gap-4">
                            <x-forms.normalInput
                                name="isbn_13"
                                label="ISBN (13 dígitos): "
                                placeholder="Ingrese el ISBN (13 dígitos)"
                                required
                                maxlength="13"
                                value="{{ $copiaLibro->isbn_13 }}"
                            />

                            <x-forms.normalInput
                                name="isbn_10"
                                label="ISBN antiguo (10 dígitos): "
                                placeholder="Ingrese el ISBN antiguo (10 dígitos)"
                                maxlength="10"
                                value="{{ $copiaLibro->isbn_10 }}"
                            />
                        </div>

                        <datalist id="editoriales">
                            @foreach ($editoriales as $editorial)
                                <option value="{{ $editorial->nombre }}">{{ $editorial->nombre }}</option>
                            @endforeach
                        </datalist>

                        <div class="grid md:grid-cols-2 gap-4">
                            <x-forms.normalInput
                                type="number"
                                name="edicion"
                                label="Número de la edición:"
                                placeholder="Indique la edición"
                                min="1"
                                required
                                value="{{ $copiaLibro->edicion }}"
                            />

                            <x-forms.normalInput
                                type="number"
                                name="ano_publicacion"
                                label="Año de publicación:"
                                placeholder="Indique el año"
                                min="1800"
                                max="2024"
                                required
                                value="{{ $copiaLibro->ano_publicacion }}"
                            />
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <x-forms.normalInput
                                type="file"
                                name="portada"
                                label="Portada:"
                                placeholder="Portada"
                                required
                            />
                        </div>
                        <div class="flex justify-center">
                            <button class="btn btn-primary" type="submit">Actualizar información</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
