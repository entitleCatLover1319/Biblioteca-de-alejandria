<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/bootstrap4-executive-suite.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="card">
            <div class="card-header">
                Edición de registro de libro.
            </div>
            <div class="card-body">
                <form class="needs-validation" enctype="multipart/form-data" action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-group">
                        <label class="form-label" for="titulo" >Título</label>
                        <input class="form-control" name="titulo" type="text" value="{{ $libro->titulo }}">
                        @error('titulo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="isbn_13" >ISBN 13 dígitos</label>
                        <input class="form-control" name="isbn_13" type="text" value="{{ $libro->isbn_13 }}">
                        @error('isbn_13')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="isbn_10" >ISBN 10 dígitos</label>
                        <input class="form-control" name="isbn_10" type="text" value="{{ $libro->isbn_10 }}">
                        @error('isbn_10')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="autor" >Autor</label>
                        <input class="form-control" name="autor" type="text" value="{{ $libro->autor }}">
                        @error('autor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="editorial" >Editorial</label>
                        <input class="form-control" name="editorial" type="text" value="{{ $libro->editorial }}">
                        @error('editorial')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="edicion" >Edición</label>
                        <input class="form-control" name="edicion" type="number" value="{{ $libro->edicion }}">
                        @error('edicion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="ano_publicacion" >Año de publicación</label>
                        <input class="form-control" name="ano_publicacion" type="number" step="1" value="{{ $libro->ano_publicacion }}">
                        @error('ano_publicacion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="cantidad_ejemplares" >Cantidad de ejemplares</label>
                        <input class="form-control" name="cantidad_ejemplares" type="number" step="1" value="{{ $libro->cantidad_ejemplares }}">
                        @error('cantidad_ejemplares')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input class="custom-file-input" name="portada" type="file" class="form-control-file" value="{{ $libro->portada }}">
                            <label class="custom-file-label" for="portada" >Portada</label>
                            @error('portada')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </form>
            </div>
        </div>
    </body>
</html>
