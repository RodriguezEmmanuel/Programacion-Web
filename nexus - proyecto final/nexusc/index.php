<?php
    // Incluye el archivo de conexión
    require_once 'conexion/conexion.php';

    // Crea una instancia de la clase de conexión
    $conexion = new Conexion();

    // Obtiene la conexión
    $conexionBD = $conexion->conectarse();

    // Realizar consultas u operaciones con $conexionBD
    $query = "SELECT id_vgame, titulo, id_dev, id_genero, id_plataforma, imagen FROM vgame";
    $result = mysqli_query($conexionBD, $query);

    // Verificar si la consulta fue exitosa
    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($conexionBD);
    }

    // Cierra la conexión
    mysqli_close($conexionBD);
?>

<?php include 'extend/header.php' ?>
<!--========== Warning error de conexio ==========-->
<?php include 'warning/error.php' ?>

<!--========== HEADER ==========-->
<main class="l-main">
    <br>
    <br>
    <br>
    <!--========== HOME ==========-->
    <section class="home" id="home"> </section>
    <!--==========CARRUSEL ==========-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicadores -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Slides -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href="not1.php">
                    <img src="img/BN31.png" alt="Imagen 1" class="carousel-img">
                </a>
            </div>
            <div class="carousel-item">
                <a href="not2.php">
                    <img src="img/ps5xbox 1.png" alt="Imagen 2" class="carousel-img">
                </a>
            </div>
            <div class="carousel-item">
                <a href="not3.php">
                    <img src="img/zelda1.png" alt="Imagen 3" class="carousel-img">
                </a>
            </div>
        </div>

        <!-- Controles de navegación -->
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!--========== news ==========-->
    
    <section class="tarjetas section bd-container" id="News">
        <?php
        // Recorre los resultados y muestra las tarjetas
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="tarjeta">';
            // Enlace que lleva al usuario a ion.php con el ID_vgame como parámetro
            echo '<a href="com/ion.php?id=' . $row['id_vgame'] . '">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['imagen']) . '" alt="Imagen ' . $row['id_vgame'] . '">';
            echo '<h5>' . $row['titulo'] . '</h5>';
            echo '</a>';
            echo '</div>';
        }

        echo '<br>';
        ?>
    </section>
 
</main>

<?php include 'extend/footer.php' ?>
