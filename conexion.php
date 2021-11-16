<?php

	$conec=mysqli_connect("localhost","root","","scorzav2");
	if ($conec->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $conec->connect_errno . ") " . $conec->connect_error;
}
?>