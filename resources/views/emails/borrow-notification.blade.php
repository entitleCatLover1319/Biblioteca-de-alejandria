<div class="container" style="padding: 1rem; background: #f5f5f5;">
    <h2>Biblioteca de Alejandría</h2>
    <h3>Prestamos</h3>
    <p>Usted ha solicitado el prestamo del libro <b>{{ $prestamo->libro->titulo }}</b>.</p>
    <p>
        Debe pasar a recogerlo dentro de los siguientes tres días hábiles.<br>
        Puede pasar por el libro a la biblioteca de <b>Lunes </b> a <b>Viernes</b>, de <b>9:00</b> a <b>19:00</b>,
        ó Sábado y Domingo de <b>9:00</b> a <b>15:00</b>.</p>
    <p>El prestamo es por <b>14 días</b>, con fecha de devolución <b>{{ $prestamo->fecha_devolucion->format('Y-m-d') }}</b>.</p>
    <p>¡Esperamos disfrute su lectura!</p>
    <p><small><i>Este correo ha sido generado automáticamente. No responder a este correo.</i></small></p>
</div>
