<?php

require_once '../conexion/conexion.php';

// Inicia la sesión
session_start();
// Crear una instancia de la clase para utilizar la conexión
$conexion = new Conexion();

// Obtener la conexión
$conexionBD = $conexion->conectarse();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION["usuario"])) {
    header("Location: ..index.php"); // Redirige a la página de inicio de sesión si no ha iniciado sesión
    exit();
}

$usuario = $_SESSION["usuario"];
// Consulta SQL para obtener el rol del usuario
$sqlRol = "SELECT * FROM rollnew WHERE usuario = '$usuario' AND rol = 'admin'";
$resultRol = $conexionBD->query($sqlRol);

// Verifica si se encontraron resultados
if ($resultRol->num_rows > 0) {
    // El usuario tiene el rol de 'admin'
} else {
    // El usuario no tiene el rol de 'admin'
    echo "Acceso no autorizado";
    exit();
}


?>