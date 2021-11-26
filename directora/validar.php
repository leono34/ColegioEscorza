<?php

include_once '../conexion.php';

$nombre = $_POST['NomUSuario'];
$apellido = $_POST['ApellidoUSuario'];
$imagen= $_FILES['imagen']['name'];
$curso=$_POST['curso'];
$user=$_POST['user'];
$clave=$_POST['clave'];
$tipouser="2";


$query = "INSERT INTO usuario (NomUsuario, ApellidoUsuario, ImagenUsuario, usuario, clave, TipoUser, tipCurso) 
    VALUES ('$nombre','$apellido','$imagen','$user','$clave','$tipouser','$curso')";
$conec->query($query);
?>
<?php 

/*depues de guardar en la base de datos mostramos una alerta y redireccionamos 


window.location.href="agregar.php";*/
echo'<script type="text/javascript">
        alert("Se agrego correctamente");
        window.location.href="agregar.php";
        </script>'; 
?>