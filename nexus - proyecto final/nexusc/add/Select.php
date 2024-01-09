<?php
require_once '../conexion/conexion.php';

// Crear una instancia de la clase para utilizar la conexión
$conexion = new Conexion();

// Obtener la conexión
$conexionBD = $conexion->conectarse();

// Realizar consultas u operaciones con $conexionBD

// Realizar la consulta para obtener los géneros, desarrollador o plataforma
$query = "SELECT id_genero, TIP_genero FROM genero";
$query1 = "SELECT Id_plat, N_plat FROM plat";
$query2 = "SELECT Id_dev, N_dev FROM dev";

$result = mysqli_query($conexionBD, $query);
$result1 = mysqli_query($conexionBD, $query1);
$result2 = mysqli_query($conexionBD, $query2);

// Verificar si la consulta fue exitosa
if (!$result || !$result1 || !$result2) {
    die("Error en la consulta: " . mysqli_error($conexionBD));
}

?>
<!---cabecera de admin---->
<?php include '../exadd/header2.php'?>

<div class="container">
    <?php include '../exadd/nav.php'?>
    <div class="main-top">
        <section class="main">
            <div class="main-top">
                <br>
                <p>Mostrar select</p>
            </div>
            <br>
            <form action="" method="post">
                <div class="mili">
                    <select name="genero" id="">
                        <option value="">Selecciona un Género</option>
                        <?php
                        // Mostrar opciones del select con los datos de la tabla "genero"
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['id_genero']}'>{$row['TIP_genero']}</option>";
                        }
                        ?>
                    </select>
                    <select name="Plat">
                        <option value="">Selecciona una plataforma </option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result1)) {
                            echo "<option value='{$row['Id_plat']}'>{$row['N_plat']}</option>";
                        }
                        ?>
                    </select>
                    <select name="dev">
                        <option value="">Seleccione un Desarrollador </option>
                        <?php
                        while ($row = mysqli_fetch_assoc($result2)) {
                            echo "<option value='{$row['Id_dev']}'>{$row['N_dev']}</option>";
                        }
                        ?>
                    </select>
                </div>
            </form>
        </section>
    </div>
</div>
