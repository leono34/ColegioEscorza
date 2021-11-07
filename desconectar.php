<?php
session_start();
include("conexion.php");

$online2 = mysqli_query($conec, "UPDATE trabajador SET con = '0' WHERE id = '".$_SESSION['id']."'")or die(mysqli_error($conec));



session_destroy();

header('Location: login.php');
?>