<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $para = "juanchope574@hotmail.com"; // Cambia esto por TU correo
    $asunto = "Nuevo mensaje de contacto - CineXtreme";
    $contenido = "Nombre: $nombre\nCorreo: $email\n\nMensaje:\n$mensaje";
    $cabeceras = "From: $email";

    if (mail($para, $asunto, $contenido, $cabeceras)) {
        header("Location: contactanos.php?exito=1");
        exit();
    } else {
        echo "❌ Error al enviar el correo.";
    }
}
?>
