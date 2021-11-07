
<!DOCTYPE html>
<html lang="es">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
 <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="icon" href="img/logo.ico" type="image/x-icon" />

</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <h3 class="text-primary text-center">IE Nº 2032 "MANUEL SCORZA TORRES” SMP</h3>
              <div class="brand-logo text-center">
                <img src="img/logo.png" alt="logo">
              </div>
              
              

              <form class="pt-3" action="" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" required name="usu">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" required name="pas">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="ingresar">Iniciar Sesion</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
 <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
<?php session_start();  

include_once 'conexion.php';


   

 if(isset($_POST['ingresar'])){

/*
mysqli_real_escape_string($_POST['']);

esto es para evitar el ' or '1'='1

*/

$email1=mysqli_real_escape_string($conec,$_POST['usu']);
$clav=mysqli_real_escape_string($conec,$_POST['pas']);

$query="select * from trabajador where usuario='$email1' and clave='$clav'";

$resultado=mysqli_query($conec,$query);

    

/*comprobar tipo de trabajador*/

$filas=mysqli_fetch_array($resultado);
if($filas ['tipo'] ==1)    //Directora o sub Directora
  { 
   $ID=$filas['id'];
        $_SESSION['id']=$ID;

   $onli=mysqli_query($conec,"update trabajador set con='1' where id ='".$_SESSION['id']."'");
      header("location:p.php");
    
      header("location: d.php");

    
  }
  else

    if($filas['tipo']==2)   //Profesor o profesora
    {  
     
   $ID=$filas['id'];
        $_SESSION['id']=$ID;

   $onli=mysqli_query($conec,"update trabajador set con='1' where id ='".$_SESSION['id']."'");
      header("location:p.php"); 
      
    }

else{
 
    echo'<script type="text/javascript">
        alert("Error al Iniciar Sesion");
         window.location.href="login.php";
        </script>';
}

   




}
?>