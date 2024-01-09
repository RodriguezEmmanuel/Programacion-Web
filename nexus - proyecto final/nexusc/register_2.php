<?php
    session_start();

    if (!isset($_SESSION['id_usser'])) {
        // Si la variable de sesión no está presente, redirigir a register_1.php
        header("Location: register_1.php");
        exit;
    }

    error_reporting(E_ALL ^ E_NOTICE);

    // Incluye el archivo de conexión
    require_once 'conexion/conexion.php';

    // Inicializa la variable $errores como un array vacío
    $errores = array();
    
    if (empty($_POST['usuario'])) {
        $errores[] = "Campo vacío, coloca tu nombre de usuario <br>";
    } else {
        $usuario = $_POST['usuario'];
        // Validamos que sólo pueda ingresar caracteres.
        if (!preg_match("/^[a-zA-Z0-9 áéíóúñüÁÉÍÓÚÑÜ]*$/", $usuario)) {
            $errores[] = "En el nombre de usuario solo se aceptan caracteres";
        }
    }
    
    if (empty($_POST['password'])) {
        $errores[] = "Campo vacío, coloca tu contraseña de usuario <br>";
    } else {
        $password = $_POST['password'];
        // Validamos que sólo pueda ingresar caracteres.
        if (!preg_match("/^[a-zA-Z0-9 áéíóúñüÁÉÍÓÚÑÜ]*$/", $password)) {
            $errores[] = "En la contraseña solo se aceptan caracteres y números";
        }
        
    }
    
    // Validación de la contraseña repetida
    if (empty($_POST['Rpassword']) || $_POST['Rpassword'] !== $_POST['password']) {
        $errores[] = "Las contraseñas no coinciden";
    }
    
    if (!$errores) {
        $response['status'] = "success"; // En css color verde
        $response['msg'] = "Registro exitoso, muchas gracias";

        // Obtener el ID de uss desde la variable de sesión
        session_start();
        $id_usser = isset($_SESSION['id_usser']) ? $_SESSION['id_usser'] : null;

        if ($id_usser !== null) {
            $conn = new Conexion();
            $conn = $conn->conectarse();

            // Insertar en la tabla rollnew utilizando el ID de uss
            $sql_rollnew = "INSERT INTO rollnew (id_usser,usuario,password) VALUES ('$id_usser', '$usuario','$password')";

            if (mysqli_query($conn, $sql_rollnew)) {
                session_start();
                echo "Registro exitoso en rollnew";
                header("Location: login.php");
                exit;

            } else {
                echo "Error al insertar en rollnew: " . mysqli_error($conn);
            }

            mysqli_close($conn);
        } else {
             $response['status'] = "error"; // En css color rojo
             $response['msg'] = "ID de usuario no disponible";  
        }
    } else {
        $response['status'] = "error"; // En css color rojo
        $response['msg'] = "Los siguientes errores sucedieron";
        $response['errores'] = isset($errores) ? $errores : array();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Agrega la siguiente línea para el ícono en la pestaña -->
    <link rel="icon" href="img/nexus-logo.ico">
    <!--css de login-->
    <link rel="stylesheet" href="css/styles.css">
    <script defer src="Js/register2.js"></script>
    <title>Register</title>
</head>

<body>
    
    <?php include 'warning/error.php'?>

        <div class="container-all">
            <!--Formulario contenedor-->
            <div class="ctn-form">
                <img src="img/nexus-logo.png" alt="nexus-log" class="logo">
                <h1 class="title"> CREA UNA CUENTA  </h1>
                <!--formulario de inicio de sesion-->
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
                        <!--label de ingresar usuario-->
                        <label for="Usser">Ingresa nombre de usuario</label>
                        <input type="text" id="Usser" name="usuario" required>
                        <!--contraseña-->
                        <label for="password">Contraseña</label>
                        <input type="password" class="password" id="password" name="password" required>
                        <!--Reconfirma tu contraseña -->
                        <label for="Rpassword">Confirmar Contraseña</label>
                        <input type="password" class="password" id="Rpassword" name="Rpassword" required>
                        <!--boton de siguiente -->
                        <input type="submit" class="newcount" value="Crear cuenta">
                
                    </form>
            </div>            
            <!--segundo contenedor-->
            <div class="ctn-fnd3">
                <div class="capa"> </div>
                <h1 class="tittle-descriptio">.</h1>
                <p class="text-description"></p>
            </div>
        </div>
</body>
</html>