<?php
// Incluye el archivo de conexión
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
    header("Location: ../count/cuenta");
}

// Realizar consultas u operaciones con $conexionBD
$query = "SELECT id_genero, TIP_genero FROM genero";
$query1 = "SELECT Id_plat, N_plat FROM plat";
$query2 = "SELECT Id_dev, N_dev FROM dev";

// Realizar la consulta para obtener los géneros, desarrollador o plataforma
$result = mysqli_query($conexionBD, $query);
$result1 = mysqli_query($conexionBD, $query1);
$result2 = mysqli_query($conexionBD, $query2);

// Verificar si la consulta fue exitosa
if (!$result || !$result1 || !$result2) {
    die("Error en la consulta: " . mysqli_error($conexionBD));
}

// INICIO DE ALMACENAMIENTO
// Si la información viene de método POST, comenzamos a validar
if(isset($_POST['submit'])){
    // Esta variable $errores almacenará todos los errores que pudiera cometer el usuario al llenar el formulario.
    // Se irá llenando dependiendo de  los posibles errores
    $errores = array();

    // Nombre del juego "titulo"
    if (empty($_POST['titulo'])) {
        $errores[] = "Nombre vacío, coloca el nombre <br>";
    } else {
        $titulo = $_POST['titulo'];
        // Validamos que sólo pueda ingresar caracteres.
        if (!preg_match("/^[a-zA-Z0-9() áéíóúñüÁÉÍÓÚÑÜ]*$/", $titulo)) {
            $errores[] = "En el nombre solo se aceptan caracteres";
        }
    }

    // Seleccionar desarrollador
    $Id_dev = $_POST['dev'];
    if (empty($Id_dev) || $Id_dev == "na") {
        $errores[] = "Selecciona un desarrollador <br>";
    }

    // Seleccionar género
    $id_genero = $_POST['genero'];
    if (empty($id_genero) || $id_genero == "na") {
        $errores[] = "Selecciona un género <br>";
    }

    // Seleccionar tipo de plataforma
    $Id_plat = $_POST['Plat'];
    if (empty($Id_plat) || $Id_plat == "na") {
        $errores[] = "Selecciona una plataforma <br>";
    }

    // Validar y almacenar la imagen
    if (empty($_FILES['imagen']['tmp_name'])) {
        $errores[] = "Seleccione una imagen <br>";
    } else {
        // Obtener el contenido de la imagen y escaparla
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    }
// Validación y almacenamiento de la interfaz y bs
    if (!$errores) {
        $response['status'] = "success"; // En CSS color verde
        $response['msg'] = "Registro exitoso, muchas gracias";

        // Preparar la consulta con marcadores de posición (?)
        $sql = "INSERT INTO vgame (titulo, id_dev, id_genero, id_plataforma, imagen) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conexionBD, $sql);

        // Vincular los parámetros
        mysqli_stmt_bind_param($stmt, "siiib", $titulo, $Id_dev, $id_genero, $Id_plat, $imagen);

        // Ejecutar la consulta
        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            echo "Registro exitoso";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexionBD);
}
        // Cerrar la sentencia
        mysqli_stmt_close($stmt);
    } else {
        $response['status'] = "error"; // En CSS color rojo
        $response['msg'] = "Los siguientes errores sucedieron";
        $response['errores'] = isset($errores) ? $errores : array();
    }
    // Fin de submit
}
?>

<?php include '../exadd/header2.php' ?>
<?php include '../warning/error.php'?>

<div class="container">
    <?php include '../exadd/nav.php'?>
    <section class="main">
        <div class="main-top">
            <br>
            <p>Bienvenido <?php echo $_SESSION['usuario']; ?></p>
            <br>
            <p>Registro de juegos</p>
        </div>
        <div class="main-body">
            <h1>¿Deseas agregar un nuevo juego?</h1>
            <!-----FORMULARIO----->
            <form action="" method="post" class="form-column" enctype="multipart/form-data" autocomplete="off">

                <!-- Agregar título -->
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" id="titulo" name="titulo" class="title" placeholder="Ingresa un nuevo título" required>
                </div>
                <!----Desarrolladores---->
                <div class="form-group">
                    <label for="N_dev">Desarrollador:</label>
                    <select name="dev">
                        <option value="na">Seleccione un Desarrollador </option>
                        <?php
                         // Mostrar opciones del select con los datos de la tabla "dev"
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<option value='{$row['Id_dev']}'>{$row['N_dev']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!----Género---->
                <div class="form-group">
                    <label for="genero">Género:</label>
                    <select name="genero" id="">
                        <option value="na">Selecciona un Género</option>
                        <?php
                        // Mostrar opciones del select con los datos de la tabla "genero"
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['id_genero']}'>{$row['TIP_genero']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!-----Plataforma----->
                <div class="form-group">
                    <label for="Plat">Plataforma:</label>
                    <select name="Plat">
                        <option value="na">Selecciona una plataforma </option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<option value='{$row['Id_plat']}'>{$row['N_plat']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <!---Imagen--->
                <div class="form-group">
                    <label for="imagen">Imagen:</label>
                    <input type="file" name="imagen" class="imagen">
                </div>
                <input type="submit" name="submit" class="sub" value="Siguiente" id="submitButton">
            </form>
        </div>
    </section>
</div>
</body>
</html>