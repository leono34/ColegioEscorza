<?php 
include '../conexion.php';
session_start(); 
if (isset($_POST['enviar'])) {   
$ruta = "../upload/";
$nombrefinal=$ruta. basename ($_FILES['file']['name']);
$upload= $ruta . $nombrefinal; 
move_uploaded_file($_FILES['file']['tmp_name'], $nombrefinal);
/*nombramos a las variable para agregar a la base de datos si gustan pueden ponerlo deirecto, pero a mi me gusta complicarme la vida :V */
$id=$_SESSION['CodUsuario'];
$nombre=$_POST['nomusuario'];
$curso=$_POST['Curso'];
$detalle=$_POST['Descrip'];
/*$upload= $ruta . $nombrefinal;
$query = "INSERT INTO archivos (idp,nomape,nombre,ruta) 
    VALUES ('$id','$nombre','$curso','$nombrefinal')";
$conec->query($query);*/

$query = "INSERT INTO archivo (IdDocente,DescripcionArchivo,ruta) 
    VALUES ('$id','$detalle','$nombrefinal')";
$conec->query($query);
}?>



<?php 
/*depues de guardar en la base de datos mostramos una alerta y redireccionamos */
echo'<script type="text/javascript">
        alert("Se agrego correctamente");
window.location.href="varchivo.php";
        </script>';


/*

echo "Nombre: <i><a download href=\"". $nombrefinal."\">".$_FILES['file']['name']."</a></i><br>"; 
*/
?>