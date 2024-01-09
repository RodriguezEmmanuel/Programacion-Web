<?php
// Inicia la sesión
session_start();

error_reporting(E_ALL ^ E_NOTICE);

require_once '../conexion/conexion.php';
require_once 'acces.php';

$conn = new Conexion ();
$conn = $conn->conectarse();

$query1 = "SELECT id_genero, TIP_genero FROM genero";

$result1 = mysqli_query($conn, $query1);

// Verificar si la consulta fue exitosa
if (!$result1) {
  die("Error en la consulta: " . mysqli_error($conn));
}

if (isset($_POST['submit'])) {
  //Esta variable $errores almacenará todos los errores que pudiera cometer el usuario al llenar el formulario.
    //Se irá llenando dependiendo de  los posibles errores
    $errores = array();
     // Nombre de genero
     if (empty($_POST['genero'])) {
      $errores[] = "Genero vacío, coloca un genero <br>";
      } else {
      $genero = $_POST['genero'];
      // Validamos que sólo pueda ingresar caracteres.
      if (!preg_match("/^[a-zA-Z() áéíóúñüÁÉÍÓÚÑÜ]*$/", $genero)) {
          $errores[] = "En genero solo se aceptan caracteres";
      }
    }

     //validacion y almacenamiento de la interfaz y bs
     if (!$errores) {

      $response['status'] = "success"; // En css color verde
      $response['msg'] = "Registro exitoso, muchas gracias";

      // Insertar en la tabla de genero
      $sql = "INSERT INTO genero (Tip_genero) VALUES ('$genero')";

      if (mysqli_query($conn, $sql)) {
        //registro exitoso de genero
        echo "Registro exitoso, usteded añadio un nuevo genero";
       
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



<!---cabezara de admin---->
<?php include '../exadd/header2.php'?>
<!----archivo que muestra los errores---->
<?php include '../warning/error.php'?>

<div class="container">
    <?php include '../exadd/nav.php'?>
    <div class="main-top">
    <section class="main">
      <div class="main-top">
        <br>
        <p> registro de generos</p>
      </div>
      <br>
    <form action="" method="post">
      <div class="mili">
      <input type="text" id="genero" name="genero"  class="genero" placeholder="Ingresa un nuevo genero" required autocomplete="off">
     <!---Mostrar los generos--->
     <select name="gen" id="">
            <option value="">Selecciona un Género</option>
            <?php
            // Mostrar opciones del select con los datos de la tabla "genero"
        while ($row = mysqli_fetch_assoc($result1)) {
            echo "<option value='{$row['id_genero']}'>{$row['TIP_genero']}</option>";
        }
        ?>
        </select>
      </div>
      <div>
        <input type="submit" name="submit" class="sub" value="Agregar" id="submitButton">
      </div>
    </form>
    </section>
  </div>