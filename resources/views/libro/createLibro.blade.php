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
        <form enctype="multipart/form-data" action="/libro" method="POST">
            @csrf

            <label for="titulo" >Título</label>
            <input name="titulo" type="text" >
            <br>
            <label for="isbn_13" >ISBN 13 dígitos</label>
            <input name="isbn_13" type="text" >
            <br>
            <label for="isbn_10" >ISBN 10 dígitos</label>
            <input name="isbn_10" type="text">
            <br>
            <label for="autor" >Autor</label>
            <input name="autor" type="text" >
            <br>
            <label for="editorial" >Editorial</label>
            <input name="editorial" type="text" >
            <br>
            <label for="edicion" >Edición</label>
            <input name="edicion" type="number" >
            <br>
            <label for="ano_publicacion" >Año de publicación</label>
            <input name="ano_publicacion" type="number" step="1" >
            <br>
            <label for="cantidad_ejemplares" >Cantidad de ejemplares</label>
            <input name="cantidad_ejemplares" type="number" step="1" >
            <br>
            <label for="portada" >Portada</label>
            <input name="portada" type="file">
            <br>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>

