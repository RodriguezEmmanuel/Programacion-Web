<?php
// index.php

// Inicia la sesión
session_start();

// Verifica si se ha hecho clic en el botón de cerrar sesión
if (isset($_POST['cerrar_sesion'])) {
    // Cierra la sesión
    session_destroy();

    // Redirige al inicio de sesión
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="img/nexus-logo.ico">
    <link rel="icon" href="../img/nexus-logo.ico">
    <link rel="stylesheet" href="css/sty.css">
      <!--========== BOX ICONS ==========-->    
     <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
      <!--=====Enlace a los estilos de Bootstrap=====-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     
    <title>Home</title>
</head>
<body>
<!--========== HEADER ==========-->
<header class="l-header" id="header">
    <nav class="nav bd-container">
      <div class="logo-container">
        <img src="img/nexus-logo.ico" alt="Logo" class="logo-image">
        <a href="index.php" class="nav__logo">Nexus</a>
    </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="index.php"   class="nav__link active-link">Inicio</a></li>
                <li class="nav__item">
                    <a href="" class="nav__link">Mi perfil</a>
                             <!-- Sublista para Mi perfil -->
                        <ul class="sub-menu">
                        <li>
                            <form method="post" action="">
                                <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
                            </form>
                        </li>
                        <li><a href="add/admin.php">Cuenta</a></li>
                    </ul>
                </li>
                <li class="nav__item"><a href="login.php" class="nav__link">Registro</a></li>

                
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>
<br>