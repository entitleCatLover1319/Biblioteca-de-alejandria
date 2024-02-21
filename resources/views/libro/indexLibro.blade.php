<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lista de Libros</title>
        <style>
            table, th, td {
                border: 1px solid;
            }
            th {
                padding-left: 10px;
                padding-right: 10px;
            }
            td {
                padding-top: 5px;
                padding-bottom: 5px;
                padding-left: 10px;
                padding-right: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Lista de libros registrados</h1>
        <table>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Edición</th>
            <th>Año publicación</th>
            <th>ISBN 13</th>
            <th>ISBN 10</th>
            <th>Cantidad de ejemplares</th>
            <th>Portada</th>
            @foreach ($libros as $libro)
            <tr>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->editorial }}</td>
                <td>{{ $libro->edicion }}</td>
                <td>{{ $libro->ano_publicacion }}</td>
                <td>{{ $libro->isbn_13 }}</td>
                <td>
                @if (isset($libro->isbn_10))
                    {{ $libro->isbn_10 }}
                @else
                    N/A
                @endif
                <td>{{ $libro->cantidad_ejemplares }}</td>
                </td>
                <td>
                    <img src="{{ asset('storage/app/' . $libro->portada) }}">
                </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
