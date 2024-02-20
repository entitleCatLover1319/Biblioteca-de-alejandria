<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <form action="/libro" method="POST">
            @csrf

            <label for="titulo" >Título</label>
            <input name="titulo" type="text" required>
            <br>
            <label for="isbn_13" >ISBN 13 dígitos</label>
            <input name="isbn_13" type="text" required>
            <br>
            <label for="isbn_10" >ISBN 10 dígitos</label>
            <input name="isbn_10" type="text">
            <br>
            <label for="autor" >Autor</label>
            <input name="autor" type="text" required>
            <br>
            <label for="editorial" >Editorial</label>
            <input name="editorial" type="text" required>
            <br>
            <label for="edicion" >Edición</label>
            <input name="edicion" type="number" required>
            <br>
            <label for="ano_publicacion" >Año de publicación</label>
            <input name="ano_publicacion" type="number" min="1901" max="2024" step="1" required/>
            <br>
            <label for="portada" >Portada</label>
            <input name="portada" type="file">
            <br>
            <button type="submit">Enviar</button>
        </form>
    </body>
</html>

