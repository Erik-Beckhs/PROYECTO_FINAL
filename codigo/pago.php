<?php
if(!isset($_GET['monto']))
{
    $idres=$_GET['idres'];

    $sql ="select * from hotelcibeles.reserva r, hotelcibeles.huesped h, hotelcibeles.habitacion ha, hotelcibeles.regimen re where r.dni=h.dni and r.id=ha.id and r.idr=re.idr and nro_res = '$idres' ";
	$re = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($re))
	{
		$precio = $row['precio'];
        $costo = $row['costo'];	
        $ingreso = $row['fecha_ingreso'];	
        $salida = $row['fecha_salida'];	
    }
    $sql1="select datediff('$salida', '$ingreso') as dias";
    $r=mysqli_query($con, $sql1);
    $re=mysqli_fetch_array($r);
    $dias=$re['dias'];
    
    $monto=$dias*($precio+$costo);
}
else {
    $monto = $_GET['monto'];
    $ingreso=$_GET['ingreso'];
    $idhab=$_GET['idhab'];
    
    include ('conexion.php');
    $sql1="select * from hotelcibeles.reserva where fecha_ingreso='$ingreso' and id='$idhab'";
    $res1=mysqli_query($con, $sql1);
    $resul1=mysqli_fetch_array($res1);
    $idres=$resul1['nro_res'];
}

?>
<section class="contact-w3ls" id="contact">
	<div class="container">
        <div class="cont">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>MONTO A CANCELAR: <?php echo $monto;?></h4>
                <p class="contact-agile2">A continuacion ingrese informacion de su cuenta bancaria</p>
                </br>
                </br>
				<form  method="GET" action="motor.php">	
					<div class="control-group form-group">
                        
                            <label class="contact-p1">No. de Tarjeta:</label>
                            <input type="text" class="form-control" name="numtar" id="name" required >
                            <p class="help-block"></p>     
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Clave:</label>
                            <input type="text" class="form-control" name="clave" id="name" required >
							<p class="help-block"></p>
                    </div>    
                    <input type="hidden" name='monto' value="<?php echo $monto;?>">
                        <input type="hidden" name='reserva' value="<?php echo $idres;?>">
                        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
                        <input type="hidden" name='codProceso' value="<?php echo $ps;?>">
                    <div class="boton">
                        <input type="submit" name="sub" value="Confirmar" class="btn btn-primary">	
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</section>