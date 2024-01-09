
<?php
class Conexion {
    function conectarse()
    {
        $conn = mysqli_connect("localhost", "root", "", "Relat_DB", 3306) or die("Lo siento, hubo un error con el servidor :(");
    
        $sql = "INSERT INTO Uss (nombre, A_paterno, A_materno, correo, Tipo_de_crit) VALUES ('$_REQUEST[nombre]', '$_REQUEST[A_paterno]', '$_REQUEST[A_materno]', '$_REQUEST[correo]', '$_REQUEST[Tipo_de_crit]')";


        if (mysqli_query($conn, $sql)) {
            echo "Registro exitoso";
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    
        mysqli_close($conn);
        return $conn;
    }
    
}

?>
