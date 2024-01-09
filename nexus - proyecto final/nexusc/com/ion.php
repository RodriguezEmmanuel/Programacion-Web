<?php
session_start();
require_once '../conexion/conexion.php';

$conexion = new Conexion();
$conexionBD = $conexion->conectarse();

if (isset($_POST['cerrar_sesion'])) {
    session_destroy();
    header("Location: ../login.php");
    exit;
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_juego = $_GET['id'];

    $query = "SELECT * FROM Videojuegos WHERE Id_vgame = ?";
    $stmt = mysqli_prepare($conexionBD, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id_juego);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && $juego = mysqli_fetch_assoc($result)) {
            // Información del juego obtenida correctamente
        } else {
            echo "Error en la consulta: " . mysqli_error($conexionBD);
        }
    } else {
        echo "Error en la preparación de la consulta: " . mysqli_error($conexionBD);
    }
} else {
    echo "ID del juego no proporcionado o no válido.";
}

if (isset($_POST['submit_comment'])) {
    $comentario = mysqli_real_escape_string($conexionBD, $_POST['comentarios']);

    if (!empty($comentario)) {
        $id_usuario = $_SESSION['id_usuario'];

        $query_insertar_comentario = "INSERT INTO comentarios (ID_Usser, ID_VGame, com_text) VALUES (?, ?, ?)";
        $stmt_insertar_comentario = mysqli_prepare($conexionBD, $query_insertar_comentario);

        if ($stmt_insertar_comentario) {
            mysqli_stmt_bind_param($stmt_insertar_comentario, "iis", $id_usuario, $id_juego, $comentario);
            mysqli_stmt_execute($stmt_insertar_comentario);
        } else {
            echo "Error en la preparación de la consulta de inserción: " . mysqli_error($conexionBD);
        }
    } else {
        echo "El comentario no puede estar vacío.";
    }
}
?>
<!-- Resto de tu código HTML -->


<!----errores---->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="../img/nexus-logo.ico">
    <link rel="icon" href="../img/nexus-logo.ico">
    <link rel="stylesheet" href="../css/sty.css">
      <!--========== BOX ICONS ==========-->    
     <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
      <!--=====Enlace a los estilos de Bootstrap=====-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     
     <title><?php echo isset($juego['titulo']) ? $juego['titulo'] : 'Videojuego'; ?></title>

    <script defer src="../Js/contcarac.js"></script>

</head>

<body>
    <!--========== HEADER ==========-->
    <header class="l-header" id="header">
        <nav class="nav bd-container">
        <div class="logo-container">
            <img src="../img/nexus-logo.ico" alt="Logo" class="logo-image">
            <a href="../index.php" class="nav__logo">Nexus</a>
        </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="../index.php"   class="nav__link active-link">Inicio</a></li>
                    <li class="nav__item">
                        <a href="" class="nav__link">Mi perfil</a>
                                <!-- Sublista para Mi perfil -->
                            <ul class="sub-menu">
                            <li>
                                <form method="post" action="">
                                    <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
                                </form>
                            </li>
                            <li><a href="../add/admin.php">Cuenta</a></li>
                        </ul>
                    </li>
                    <li class="nav__item"><a href="../login.php" class="nav__link">Registro</a></li>

                    
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>
<br>
<br>
<br>
<div class="container">
    <!-- Muestra la informacion del juego como el titulo, imagen, desarrollador, genero y plataforma -->
    <section class="main-course">
        <div class="course-box">
            <!-- Mostrar título del juego -->
            <h1><?php echo isset($juego['titulo']) ? $juego['titulo'] : 'Título no disponible'; ?></h1>
            <!-- Mostrar imagen del juego -->
            <div class="course">
                <div class="tarjeta">
                    <img src="data:image/jpeg;base64,<?php echo base64_encode($juego['imagen']); ?>">
                </div>
                <!-- Mostrar campos como el desarrollador, genero y plataforma -->
                <div class="box-img">
                    <h6 class="txt-gen" style="color:#019533 ;"><strong> Desarrollador: </strong></h6> <h6><?php echo $juego['Nombre_Desarrollador']; ?></h6>
                    <h6 class="txt-gen" style="color:#F74900 ;"><strong>Género: </strong></h6> <h6> <?php echo $juego['Tipo_Genero']; ?></h6>
                    <h6 class="txt-gen" style="color:#E70012;"><strong>Plataforma:</strong></h6> <h6>  <?php echo $juego['Nombre_Plataforma']; ?></h6>
                </div>
            </div>
        </div>
    </section>
</div>
</section>
    </div>
    <script src="https://utteranc.es/client.js"
        repo="RodriguezEmmanuel/feedback-management"
        issue-term="title"
        theme="github-light"
        crossorigin="anonymous"
        async>
</script>
      
</body>
</html>