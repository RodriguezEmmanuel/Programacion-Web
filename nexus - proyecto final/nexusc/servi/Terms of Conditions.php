<?php
// index.php

// Inicia la sesión
session_start();

// Verifica si se ha hecho clic en el botón de cerrar sesión
if (isset($_POST['cerrar_sesion'])) {
    // Cierra la sesión
    session_destroy();

    // Redirige al inicio de sesión
    header("Location: ../login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="icon" href="../img/nexus-logo.ico">
    <link rel="stylesheet" href="../css/sty.css">
      <!--========== BOX ICONS ==========-->    
     <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
     <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
      <!--=====Enlace a los estilos de Bootstrap=====-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <title>Home</title>
</head>
<body>

<style>
        .descripcion {
          text-align: left;
          margin: 20px auto 0;
          max-width: 600px;
        }
        .sub-menu {
        display: none;
        position: absolute;
        background-color: #fff; /* Puedes personalizar el color de fondo */
        border: 1px solid #ccc; /* Puedes personalizar el borde */
        padding: 10px;
        z-index: 1;
        }

        .nav__item:hover .sub-menu {
            display: block;
        }  
        
    </style>
<!--========== HEADER ==========-->
<header class="l-header" id="header">
    <nav class="nav bd-container">
      <div class="logo-container">
        <img src="../img/nexus-logo.ico" alt="Logo" class="logo-image">
        <a href="../index.php" class="nav__logo">Nexus</a>
    </div>

        <div class="nav__menu" id="nav-menu">
            <ul class="nav__list">
                <li class="nav__item"><a href="../index.php" class="nav__link active-link">Inicio</a></li>
                <li class="nav__item"><a href="" class="nav__link">Mi perfil</a>
                 <ul class="sub-menu">
                        <li>
                            <form method="post" action="">
                                <input type="submit" name="cerrar_sesion" value="Cerrar Sesión">
                            </form>
                        </li>
                        <li><a href="../add/cuenta.php">Cuenta</a></li>
                    </ul>
                </li>
                <li class="nav__item"><a href="../login.php" class="nav__link">Registro</a></li>

                <li><i class='bx bx-moon change-theme' id="theme-button"></i></li>
            </ul>
        </div>

        <div class="nav__toggle" id="nav-toggle">
            <i class='bx bx-menu'></i>
        </div>
    </nav>
</header>

   <!--==================== Texto ====================-->


      <section class="about section bd-container" id="about">
      <div class="descripcion">
    <h2>
        Términos y Condiciones
    </h2>
    <ol>
        <li>
        Aceptación de los Términos: Al acceder y utilizar nuestro sitio de menú de comida, los usuarios aceptan cumplir con los siguientes términos y condiciones en su totalidad. Si no están de acuerdo con alguno de estos términos, se les solicita que no utilicen el sitio.
        </li>
        <li>
        Uso del Sitio: Nuestro sitio de menú de comida se proporciona únicamente con fines informativos y de promoción de nuestros productos y servicios. Los usuarios aceptan utilizar el sitio de manera lícita y de acuerdo con las leyes y regulaciones aplicables.
        </li>
        <li>
        Precisión de la Información: Nos esforzamos por brindar información precisa y actualizada en nuestro sitio de menú de comida. Sin embargo, no garantizamos la exactitud, integridad o actualidad de la información proporcionada. Los usuarios son responsables de verificar la precisión de la información antes de tomar decisiones basadas en ella.
        </li>
        <li>
        Propiedad Intelectual: Todos los derechos de propiedad intelectual, incluyendo pero no limitado a derechos de autor, marcas registradas y derechos de propiedad sobre el contenido y diseño del sitio, son propiedad exclusiva nuestra o de los terceros que nos han otorgado licencia para utilizar dichos materiales. Los usuarios no están autorizados a copiar, modificar, distribuir o utilizar cualquier contenido del sitio sin nuestro consentimiento previo por escrito.
        </li>
        <li>
        Enlaces a Terceros: Nuestro sitio de menú de comida puede contener enlaces a sitios web de terceros. Estos enlaces se proporcionan únicamente para la conveniencia de los usuarios. No tenemos control sobre el contenido o las políticas de privacidad de esos sitios y no asumimos ninguna responsabilidad por ellos.
        </li>
        <li>
        Protección de Datos Personales: La recopilación, uso y protección de los datos personales de los usuarios se rigen por nuestras políticas de privacidad, que deben leerse y aceptarse por separado. Al utilizar nuestro sitio de menú de comida, los usuarios aceptan el procesamiento de sus datos personales de acuerdo con nuestras políticas de privacidad.
        </li>
        <li>
        Exclusión de Responsabilidad: No asumimos ninguna responsabilidad por cualquier pérdida, daño o perjuicio directo, indirecto o consecuente que pueda surgir del uso o la imposibilidad de uso de nuestro sitio de menú de comida, incluyendo interrupciones o errores técnicos.
        </li>
        <li>
        Modificaciones y Terminación: Nos reservamos el derecho de modificar, suspender o finalizar el sitio de menú de comida en cualquier momento y sin previo aviso. También podemos modificar estos términos y condiciones en cualquier momento y se considerará que los usuarios aceptan dichas modificaciones al continuar utilizando el sitio.
        </li>
        <li>
        Legislación Aplicable y Jurisdicción: Estos términos y condiciones se regirán e interpretarán de acuerdo con las leyes de México. Cualquier disputa que surja en relación con el sitio de menú de comida estará sujeta a la jurisdicción exclusiva de los tribunales de México.
        </li>
    </ol>
    <p>
        Al utilizar nuestro sitio de menú de comida, los usuarios aceptan y se comprometen a cumplir con estos términos y condiciones. Es importante que los usuarios revisen regularmente estos términos, ya que pueden estar sujetos a modificaciones.
    </p>
      </div>    
<!--========== SCROLL REVEAL ==========-->
<script src="https://unpkg.com/scrollreveal"></script>

<!--========== MAIN JS ==========-->
<script src="../Js/main.js"></script>