<?php
        $f=$_POST['codFlujo'];
        $p=$_POST['codProceso'];

		$idhab=$_POST['idhab'];
		$ingreso=$_POST['ingreso'];
		$salida=$_POST['salida'];

        $dni=$_POST['dni'];
        $nombre=$_POST['nombre'];
        $paterno=$_POST['paterno'];
        $materno=$_POST['materno'];
        $fechanac=$_POST['fechanac'];
        $nacionalidad=$_POST['pais'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        
        $regimen=$_POST['regimen'];
		
		include('conexion.php');
		$sql="insert into hotelcibeles.huesped values ('$dni', '$paterno', '$materno', '$nombre','$fechanac','$nacionalidad','$email', '$telefono')";
        mysqli_query($con, $sql);

        //calcular montos totales

    $sql1="select idr from hotelcibeles.regimen where tipor='$regimen' and cantidad=(select camas from hotelcibeles.habitacion where id='$idhab')";
    $res1=mysqli_query($con, $sql1);
    if($resul1=mysqli_fetch_array($res1))
    {

        $sw=1;    
    
        $idr=$resul1['idr'];
        $sqldias="select datediff('$salida', '$ingreso') as dias";

        $resx=mysqli_query($con, $sqldias);
        $resxx=mysqli_fetch_array($resx);
        $tiempo=$resxx['dias'];

        $sqlpagohab="select precio from hotelcibeles.habitacion where id='$idhab'";

        $resx1=mysqli_query($con, $sqlpagohab);
        $resxx1=mysqli_fetch_array($resx1);
        $pago=$resxx1['precio'];

        $sqlpagoreg="select costo from hotelcibeles.regimen where idr='$idr'";

        $resx2=mysqli_query($con, $sqlpagoreg);
        $resxx2=mysqli_fetch_array($resx2);
        $costo=$resxx2['costo'];

        //echo $tiempo." ".$costo." ".$pago;

        $monto=$tiempo*($costo+$pago);
        //echo $monto;
        
        $sql2="insert into hotelcibeles.reserva (dni, id, fecha_ingreso, fecha_salida, estado, idr, total) values ('$dni', '$idhab', '$ingreso', '$salida', 'sin confirmar', '$idr', '$monto')";
    }
    else {  
        $sw=0;

        $sqldias="select datediff('$salida', '$ingreso') as dias from hotelcibeles.reserva";

        $resx=mysqli_query($con, $sqldias);
        $resxx=mysqli_fetch_array($resx);
        $tiempo=$resxx['dias'];

        $sqlpagohab="select precio from hotelcibeles.habitacion where id='$idhab'";

        $resx1=mysqli_query($con, $sqlpagohab);
        $resxx1=mysqli_fetch_array($resx1);
        $pago=$resxx1['precio'];

        $monto=$tiempo*$pago;
        
        $sql2="insert into hotelcibeles.reserva (dni, id, fecha_ingreso, fecha_salida, estado, idr, total) values ('$dni', '$idhab', '$ingreso', '$salida', 'sin confirmar', 1, ('$tiempo'*'$pago'))";
    }   
    mysqli_query($con, $sql2);
    include('cerrar_conexion.php');

    header("Location:motor.php?codFlujo=$f&codProceso=$p&monto=$monto&ingreso=$ingreso&idhab=$idhab");
?>