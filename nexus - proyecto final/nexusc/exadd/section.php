<section class="main">
    <div class="main-top">
        <br>
        <p>Bienvenido <?php echo $_SESSION['usuario']; ?></p>
        <br>
        <p> registro de juegos</p>
    </div>
    <div class="main-body">
        <h1>¿Deseas agregar un nuevo juego?</h1>
        <!--agregar titulo-->
        <form action="" method="post" class="form-column" enctype="multipart/form-data " autocomplete="off">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" class="title" placeholder="Ingresa un nuevo título" required>
            </div>
                <!----desarrolladores---->
            <div class="form-group">
                <label for="N_dev">Desarrollador:</label>
                <select name="N_dev" id="N_dev">
                    <option> </option>
                    <option>Desarrollador</option>
                    <!-- ... (otras opciones) -->
                </select>
            </div>
            <!----genero---->
            <div class="form-group">
                <label for="genero">Género:</label>
                <select name="genero" id="genero">
                    <option> </option>
                    <option>Role-Playing Game (RPG)</option>
                    <!-- ... (otras opciones) -->
                </select>
            </div>

            <!-----plataforma----->
            <div class="form-group">
                <label for="Plat">Plataforma:</label>
                <select name="Plat" id="Plat">
                    <option> </option>
                    <option>XBOX</option>
                    <option> Play Station </option>
                    <option> Nintendo </option>
                    <option> PC </option>
                    <option> Multiplataforma</option>
                    <!-- ... (otras opciones) -->
                </select>
            </div>
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input class="D_lanzamiento" type="date" id="fecha" name="D_lanzamiento">
            </div>
            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen">
            </div>


            <input type="submit" value="Agregar">
        </form>
    </div>
</section>