<?php
// Inicia la sesión
session_start();

error_reporting(E_ALL ^ E_NOTICE);

require_once '../conexion/conexion.php';
require_once 'acces.php';

$conn = new Conexion ();
$conn = $conn->conectarse();



$query = "SELECT Id_dev, N_dev FROM dev";

$result = mysqli_query($conn, $query);
if (!$result) {
  die("Error en la consulta: " . mysqli_error($conn));
}


if (isset($_POST['submit'])) {
  //Esta variable $errores almacenará todos los errores que pudiera cometer el usuario al llenar el formulario.
    //Se irá llenando dependiendo de  los posibles errores
    $errores = array();
     // Nombre de genero
     if (empty($_POST['N_dev'])) {
      $errores[] = "Desarrollador vacío, coloca un desarrollador <br>";
      } else {
      $N_dev = $_POST['N_dev'];
      // Validamos que sólo pueda ingresar caracteres.
      if (!preg_match("/^[a-zA-Z0-9() áéíóúñüÁÉÍÓÚÑÜ]*$/", $N_dev)) {
          $errores[] = "Solo se aceptan caracteres y numeros";
      }
    }

     //validacion y almacenamiento de la interfaz y bs
     if (!$errores) {

      $response['status'] = "success"; // En css color verde
      $response['msg'] = "Registro exitoso, muchas gracias";


      // Insertar en la tabla de genero
      $sql = "INSERT INTO dev (N_dev) VALUES ('$N_dev')";

      
      if (mysqli_query($conn, $sql)) {
        //registro exitoso de genero
        echo "Registro exitoso, usteded añadio un nuevo desarrollador";
       
      }
        else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

      mysqli_close($conn);
      } else {
          $response['status'] = "error"; // En css color rojo
          $response['msg'] = "Los siguientes errores sucedieron";
          $response['errores'] = isset($errores) ? $errores : array();
      }
    
  //fin del submit
  }
?>

<?php include '../exadd/header2.php'?>

<?php include '../warning/error.php'?>

<div class="container">
    <?php include '../exadd/nav.php'?>
    <div class="main-top">
    <section class="main">
      <div class="main-top">
        <br>
        <p> registro de desarrolladores</p>
      </div>
      <br>
    <form action="" method="post">
      <div class="mili">
      <input type="text" id="N_dev" name="N_dev"  class="N_dev" placeholder="Ingresa un nuevo desarrollador" required>
      <!---mostrar dev--->
      <select name="dev">
          <option value="">Seleccione un Desarrollador </option>
          <?php
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value='{$row['Id_dev']}'>{$row['N_dev']}</option>";
          }
          ?>
      </select>
      </div>
        <input type="submit" name="submit" class="sub" value="Agregar" id="submitButton">
    </form>
    </section>
  </div>