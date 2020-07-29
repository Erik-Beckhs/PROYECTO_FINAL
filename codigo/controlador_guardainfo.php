<?php
session_start();
$us=$_SESSION['user'];
$f=$_GET['codFlujo'];
$p=$_GET['codProceso'];
$idres=$_GET['idres'];

include ('conexion.php');
$sql="insert into estado (codFlujo, codProceso, usuario, fechainicio, idr) values ('$f', '$p', '$us', CURRENT_DATE, '$idres')";
mysqli_query($con, $sql);

include('cerrar_sesion.php');
;?>