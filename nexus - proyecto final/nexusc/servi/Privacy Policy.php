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
     <script src="../Js/main.js"></script>
    <title>Home</title>
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
<br>
   
      <style>
        .descripcion {
          text-align: left;
          margin: 20px auto 0;
          max-width: 600px;
        }
      </style>
<br>
<div class="descripcion">
                <h2>Políticas de Privacidad</h2>
                <ol>
                  <li>
                    Recopilación de datos: Se recopilarán datos personales como nombres, direcciones de correo electrónico, números de teléfono y ubicaciones, exclusivamente con el consentimiento expreso de los usuarios. Estos datos se utilizarán para brindar servicios personalizados, procesar pedidos, mejorar la experiencia del usuario y enviar comunicaciones relevantes.
                  </li>
                  <li>
                    Uso de datos: Los datos personales recopilados se utilizarán con el propósito exclusivo de proporcionar los servicios solicitados por los usuarios, incluyendo la presentación de menús personalizados, promociones y descuentos, así como para mejorar nuestros servicios y comprender mejor las preferencias de los usuarios. No compartiremos los datos con terceros sin el consentimiento explícito del usuario, a menos que sea requerido por ley.
                  </li>
                  <li>
                    Consentimiento: Para recopilar y procesar los datos personales de los usuarios, se obtendrá un consentimiento claro y voluntario a través de una casilla de verificación o cualquier otro método que permita al usuario expresar su acuerdo con nuestras políticas de privacidad y términos y condiciones.
                  </li>
                  <li>
                    Seguridad de los datos: Implementaremos medidas de seguridad técnicas, administrativas y físicas para proteger los datos personales de los usuarios contra el acceso no autorizado, el uso indebido, la alteración o la divulgación. Esto incluirá el uso de encriptación de datos, firewalls y procedimientos de acceso restringido.
                  </li>
                  <li>
                    Derechos de los usuarios: Los usuarios tienen el derecho de acceder, rectificar, cancelar y oponerse al procesamiento de sus datos personales. Para ejercer estos derechos, se proporcionarán mecanismos de contacto y se responderá a las solicitudes en un plazo razonable.
                  </li>
                  <li>
                    Retención de datos: Los datos personales se retendrán únicamente durante el tiempo necesario para cumplir con los fines establecidos en estas políticas de privacidad, a menos que la ley exija o permita un período de retención más prolongado.
                  </li>
                  <li>
                    Cookies y seguimiento en línea: Utilizaremos cookies y otras tecnologías de seguimiento para mejorar la funcionalidad del sitio web y recopilar información no identificable sobre las preferencias y el comportamiento de los usuarios. Los usuarios podrán administrar sus preferencias de cookies a través de la configuración del navegador.
                  </li>
                  <li>
                    Comunicación y marketing: Podremos enviar comunicaciones comerciales y promocionales a los usuarios que hayan proporcionado su consentimiento expreso para recibir dichas comunicaciones. Los usuarios podrán cancelar su suscripción a estas comunicaciones en cualquier momento.
                  </li>
                  <li>
                    Cambios en las políticas: Nos reservamos el derecho de modificar estas políticas de privacidad en cualquier momento. Los cambios serán notificados a los usuarios a través del sitio web u otros medios apropiados. Al continuar utilizando el sitio web después de cualquier modificación, se considerará que los usuarios aceptan los cambios realizados.
                  </li>
                </ol> 
              </div>                    
<!--========== SCROLL REVEAL ==========-->
<script src="https://unpkg.com/scrollreveal"></script>

<!--========== MAIN JS ==========-->
<script src="../Js/main.js"></script>