<?php
ob_start();
session_start();
$_SESSION['sesion_exito']=0;
$user=$_POST['usuario'];
$clave=$_POST['clave'];
//$f=$_POST['codFlujo'];
//$ps=$_POST['codProceso'];
if($user=="" || $clave=="")
{
    $_SESSION['sesion_exito']=2;//datos vacios
}
else {
    include('conexion.php');
    $_SESSION['sesion_exito']=3;//datos erroneos
    $sql="select * from login where usuario='$user' and clave='$clave'";
    $res=mysqli_query($con, $sql);
    while ($registro=mysqli_fetch_array($res))
    {
        $_SESSION['sesion_exito']=1;
    }
    include('cerrar_conexion.php');
}

if($_SESSION['sesion_exito']<>1)
{
    header('Location:index.php');
}
else{
    $_SESSION['user']=$user;
    include ('conexion.php');
    $sql1="select * from estado where usuario='$user'";
    $r=mysqli_query($con, $sql1);
    if($res=mysqli_fetch_array($r))
    {
        if($res['fechafin']==NULL)
        {
            $f=$res['codFlujo'];
            $p=$res['codProceso'];
            $idres=$res['idr'];
            header("Location:motor.php?usuario=$user&codFlujo=$f&codProceso=$p&idres=$idres");
        }
        else {
            header("Location:motor.php?usuario=$user");
        }
    }
    else {
        echo "no existe el login";
        header("Location:motor.php?usuario=$user");
    }
}
?>