<?php
$host = "localhost";
$user = "root";
$clave = "";
$bd = "negocio1";
$conexion = mysqli_connect($host, $user, $clave, $bd);
if(mysqli_connect_errno()){
    echo "NO SE PUDO CONECTAR LA BD";
    exit();
}

mysqli_select_db($conexion,$bd) or die("no se encuentra la BD");
mysqli_set_charset($conexion, "utf8");

?>