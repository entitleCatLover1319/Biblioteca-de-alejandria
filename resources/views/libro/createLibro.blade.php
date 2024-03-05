<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/bootstrap4-executive-suite.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="container h-100">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card" style="width: 500px">
                    <div class="card-body">
                        <div class="card-header">
                            Registro de nuevo libro.
                        </div>
                        <form class="needs-validation" enctype="multipart/form-data" action="/libro" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="titulo" >Título</label>
                                <input class="form-control" name="titulo" type="text" value="{{ old('titulo') }}">
                                <x-validation-error name="titulo" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="isbn_13" >ISBN 13 dígitos</label>
                                <input class="form-control" name="isbn_13" type="text" value="{{ old('isbn_13') }}">
                                <x-validation-error name="isbn_13" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="isbn_10" >ISBN 10 dígitos (si aplica)</label>
                                <input class="form-control" name="isbn_10" type="text" value="{{ old('isbn_10') }}">
                                <x-validation-error name="isbn_10" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="autor" >Autor</label>
                                <input class="form-control" name="autor" type="text" value="{{ old('autor') }}">
                                <x-validation-error name="autor" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="editorial" >Editorial</label>
                                <input class="form-control" name="editorial" type="text" value="{{ old('editorial') }}">
                                <x-validation-error name="editorial" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="edicion" >Edición</label>
                                <input class="form-control" name="edicion" type="number" value="{{ old('edicion') }}">
                                <x-validation-error name="edicion" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="ano_publicacion" >Año de publicación</label>
                                <input class="form-control" name="ano_publicacion" type="number" step="1" value="{{ old('ano_publicacion') }}">
                                <x-validation-error name="ano_publicacion" />
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cantidad_ejemplares" >Cantidad de ejemplares</label>
                                <input class="form-control" name="cantidad_ejemplares" type="number" step="1" value="{{ old('cantidad_ejemplares') }}">
                                <x-validation-error name="cantidad_ejemplares" />
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input class="custom-file-input" name="portada" type="file" class="form-control-file" value="{{ old('portada') }}">
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>

