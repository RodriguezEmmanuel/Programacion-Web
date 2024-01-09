<?php
class Conexion {
    private $conn;

    function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "Relat_DB", 3306) or die("Lo siento, hubo un error con el servidor :(");
    }

    function conectarse()
    {
        return $this->conn;
    }
}
?>