<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        @endif
        <form enctype="multipart/form-data" action="{{ route('libro.update', ['libro' => $libro->id]) }}" method="POST">
            @csrf
            @method('PATCH')

            <label for="titulo" >Título</label>
            <input name="titulo" type="text" value="{{ $libro->titulo }}" >
            <br>
            <label for="isbn_13" >ISBN 13 dígitos</label>
            <input name="isbn_13" type="text" value="{{ $libro->isbn_13 }}">
            <br>
            <label for="isbn_10" >ISBN 10 dígitos</label>
            <input name="isbn_10" type="text" value="{{ $libro->isbn_10 }}">
            <br>
            <label for="autor" >Autor</label>
            <input name="autor" type="text" value="{{ $libro->autor }}">
            <br>
            <label for="editorial" >Editorial</label>
            <input name="editorial" type="text" value="{{ $libro->editorial }}">
            <br>
            <label for="edicion" >Edición</label>
            <input name="edicion" type="number" value="{{ $libro->edicion }}">
            <br>
            <label for="ano_publicacion" >Año de publicación</label>
            <input name="ano_publicacion" type="number" step="1" value="{{ $libro->ano_publicacion }}">
            <br>
            <label for="cantidad_ejemplares" >Cantidad de ejemplares</label>
            <input name="cantidad_ejemplares" type="number" step="1" value="{{ $libro->cantidad_ejemplares}}">
            <br>
            <label for="portada" >Portada</label>
            <input name="portada" type="file" value="{{ $libro->portada }}">
            <br>
            <button type="submit">Actualizar</button>
        </form>
    </body>
</html>
