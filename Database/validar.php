<?php

$clave=$_POST["Clave"];
$contrasena=$_POST["Contraseña"];
session_start();

$_SESSION["clave"]=$clave;

$conn=mysqli_connect("localhost", "root", "", "uees");
$consulta="SELECT * FROM login WHERE clave='$clave' and contrasena= '$contrasena'";
$resultado=mysqli_query($conn,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas)
{
    header("location:inic.html");
}
else
{

?>

<?php
include("index.html");


?>

<h2 class="bad">ERROR EN LA AUTENTIFICACION</H2>

<?php
}


mysqli_free_result($resultado);
mysqli_close($conn);

?>