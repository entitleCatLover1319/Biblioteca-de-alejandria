<x-app-layout>
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <div class="card" style="width: 500px">
                <div class="card-body">
                    <div class="card-header">
                        Edición de registro de libro.
                    </div>
                    <form class="needs-validation" enctype="multipart/form-data" action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="form-group">
                            <label class="form-label" for="titulo" >Título</label>
                            <input class="form-control" name="titulo" type="text" value="{{ $libro->titulo }}">
                            <x-validation-error name="titulo" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="isbn_13" >ISBN 13 dígitos</label>
                            <input class="form-control" name="isbn_13" type="text" value="{{ $libro->isbn_13 }}">
                            <x-validation-error name="isbn_13" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="isbn_10" >ISBN 10 dígitos (si aplica)</label>
                            <input class="form-control" name="isbn_10" type="text" value="{{ $libro->isbn_10 }}">
                            <x-validation-error name="isbn_10" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="autor" >Autor</label>
                            <input class="form-control" name="autor" type="text" value="{{ $libro->autor }}">
                            <x-validation-error name="autor" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="editorial" >Editorial</label>
                            <input class="form-control" name="editorial" type="text" value="{{ $libro->editorial }}">
                            <x-validation-error name="editorial" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="edicion" >Edición</label>
                            <input class="form-control" name="edicion" type="number" value="{{ $libro->edicion }}">
                            <x-validation-error name="edicion" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="ano_publicacion" >Año de publicación</label>
                            <input class="form-control" name="ano_publicacion" type="number" step="1" value="{{ $libro->ano_publicacion }}">
                            <x-validation-error name="ano_publicacion" />
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="cantidad_ejemplares" >Cantidad de ejemplares</label>
                            <input class="form-control" name="cantidad_ejemplares" type="number" step="1" value="{{ $libro->cantidad_ejemplares }}">
                            <x-validation-error name="cantidad_ejemplares" />
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input class="custom-file-input" name="portada" type="file" class="form-control-file" value="{{ $libro->portada }}">
                                <label class="custom-file-label" for="portada" >Portada</label>
                                <x-validation-error name="portada" />
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
