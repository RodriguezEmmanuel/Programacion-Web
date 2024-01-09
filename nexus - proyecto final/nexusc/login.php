<?php
session_start();

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera las credenciales del formulario
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Realiza la conexión a la base de datos (ajusta los valores con los tuyos)
    $conn = new mysqli("localhost", "root", "", "Relat_DB");


    // Verifica la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Consulta SQL para verificar las credenciales
    $sql = "SELECT * FROM rollnew WHERE usuario = '$usuario' AND password = '$contrasena'";
    $result = $conn->query($sql);

    // Verifica si se encontraron resultados
    if ($result->num_rows > 0) {
        // Las credenciales son válidas
        $_SESSION["usuario"] = $usuario;

        // Cierra la conexión a la base de datos
        $conn->close();

        // Redirige al usuario a index.php
        header("Location: index.php");
        exit;
    } else {
        // Las credenciales son incorrectas
        echo "Credenciales incorrectas";
    }

    // Cierra la conexión a la base de datos
    $conn->close();

   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/nexus-logo.ico">

    <!---boot-->
    
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var usuarioInput = document.getElementById('usuario');
            var contrasenaInput = document.getElementById('contrasena');

            usuarioInput.addEventListener('paste', function(e) {
                e.preventDefault(); // Evita la acción de pegar
            });

            contrasenaInput.addEventListener('paste', function(e) {
                e.preventDefault(); // Evita la acción de pegar
            });
        });
    </script>
</head>
<body>
    <div class="container-all">
        <div class="ctn-form">
            <img src="img/nexus-logo.png" alt="nexus-log" class="logo">
            <h1 class="title"> INICIAR SESIÓN  </h1>
            <form action="" method="post">
                <label for="usuario">Usuario</label>
                <input type="text" id="usuario" name="usuario" required>
                <label for="contrasena">Contraseña</label>
                <input type="password" id="contrasena" name="contrasena" required>
                <input type="submit" class="accses" value="Iniciar sesión">
            </form>
            <span class="text-footer">¿No tienes cuenta?
                <a href="register_1.php" class="new">Registrate</a>
            </span>
        </div>
        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="tittle-descriptio">.</h1>
            <p class="text-description"></p>
        </div>
    </div>
</body>

</html>


