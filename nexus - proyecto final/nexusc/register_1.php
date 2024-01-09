<?php
// Validación
// Error reporting elimina warnings que pueden aparecer a nivel de ejecución de la página web.
error_reporting(E_ALL ^ E_NOTICE);
// Realizo los include correspondientes a la conexión
include 'conexion/conexion.php';

// Si la información viene de método POST, comenzamos a validar
if (isset($_POST['submit'])) {
    //Esta variable $errores almacenará todos los errores que pudiera cometer el usuario al llenar el formulario.
    //Se irá llenando dependiendo de  los posibles errores
    $errores = array();

    // Nombre
    if (empty($_POST['nombre'])) {
        $errores[] = "Nombre vacío, coloca tu nombre <br>";
    } else {
        $nombre = $_POST['nombre'];
        // Validamos que sólo pueda ingresar caracteres.
        if (!preg_match("/^[a-zA-Z áéíóúñüÁÉÍÓÚÑÜ]*$/", $nombre)) {
            $errores[] = "En el nombre solo se aceptan caracteres";
        }
    }

    // Apellido Paterno
    if (empty($_POST['A_paterno'])) {
        $errores[] = "Apellido paterno vacío, coloca tu apellido <br>";
    } else {
        $A_paterno = $_POST['A_paterno'];
        // Validamos que sólo pueda ingresar caracteres.
        if (!preg_match("/^[a-zA-Z áéíóúñüÁÉÍÓÚÑÜ]*$/", $A_paterno)) {
            $errores[] = "En el apellido paterno solo se aceptan caracteres";
        }
    }

    // Apellido Materno
    if (empty($_POST['A_materno'])) {
        $errores[] = "Apellido materno vacío, coloca tu apellido <br>";
    } else {
        $A_materno = $_POST['A_materno'];
        // Validamos que sólo pueda ingresar caracteres.
        if (!preg_match("/^[a-zA-Z áéíóúñüÁÉÍÓÚÑÜ]*$/", $A_materno)) {
            $errores[] = "En el apellido materno solo se aceptan caracteres";
        }
    }

    // Correo
    if (empty($_POST['correo'])) {
        $errores[] = "Correo vacío <br>";
    } else {
        $correo = $_POST['correo'];
        // Validación de formato de correo
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Formato de correo electrónico incorrecto";
        }
    }


    //buttonm
    if (empty($_POST['Tipo_de_crit'])) {
        $errores[] = "Seleccion no valida";
    }else{
        $Tipo_de_crit = $_POST['Tipo_de_crit'];
    }

    //validacion y almacenamiento de la interfaz y bs
    if (!$errores) {
        $response['status'] = "success"; // En css color verde
        $response['msg'] = "Registro exitoso, muchas gracias";

        $conn = new Conexion ();
        $conn = $conn->conectarse();

        // Insertar en la tabla uss
        $sql = "INSERT INTO Uss (nombre, A_paterno, A_materno, correo, Tipo_de_crit) VALUES ('$nombre', '$A_paterno', '$A_materno', '$correo', '$Tipo_de_crit')";

        if (mysqli_query($conn, $sql)) {
            // Obtener el ID generado por la última consulta INSERT
            $id_usser = mysqli_insert_id($conn);

            // Almacenar el ID en una variable de sesión o en algún lugar para su uso posterior en register2.php
            session_start();
            $_SESSION['id_usser'] = $id_usser;

            echo "Registro exitoso";

            // Redireccionar a register_2.php
            header("Location: register_2.php");
            exit;

            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
        } else {
            $response['status'] = "error"; // En css color rojo
            $response['msg'] = "Los siguientes errores sucedieron";
            $response['errores'] = isset($errores) ? $errores : array();
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/nexus-logo.ico">
    <link rel="stylesheet" href="css/styles.css">
    <title>Register</title>
</head>
<script defer src="Js/register.js"></script>

<body>
    <!---Se invoca en el archivo de error en el llenado de la interfaz--->
    <?php include 'warning/error.php'?>
    <!--inicia la interfaz del usuario-->
    <div class="container-all">
        <div class="ctn-fnd2">
            <div class="capa"></div>
            <h1 class="tittle-descriptio">.</h1>
            <p class="text-description"></p>
        </div>
        <div class="ctn-form">
            <h1 class="title">CREA UNA CUENTA</h1>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" autocomplete="off">
                <label for="Name">Nombre</label>
                <input type="text" id="nombre" name="nombre">
                <label for="Aparteno">Apellido paterno</label>
                <input type="text" id="Aparteno" name="A_paterno">

                <label for="Amarteno">Apellido materno</label>
                <input type="text" id="Amarteno" name="A_materno">

                <label for="Correo">Correo</label>
                <input type="text" id="correo" name="correo">

                <label>¿Qué tipo eres?</label>
                <div class="radio-group">
                    <label>
                        <input type="radio" class="custom-radio crip" name="Tipo_de_crit" value="C"> Crítica
                    </label>
                    <label>
                        <input type="radio" class="custom-radio crip2" name="Tipo_de_crit" checked="checked" value="G"> General
                    </label>
                    <input type="hidden" id="radioValue" name="tipo">
                </div>

                <input type="submit" name="submit" class="sub" value="Siguiente" id="submitButton">
            </form>
        </div>            
    </div>

</body>
</html>