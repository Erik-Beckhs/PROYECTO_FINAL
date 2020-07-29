    <?php
    $ingreso=$_GET['ingreso'];
    $salida=$_GET['salida'];
    $cama=$_GET['selector'];
    $tipo=$_GET['tipo'];
    include('conexion.php');
    $sql="select * from hotelcibeles.reserva r, hotelcibeles.habitacion h where r.id=h.id and ((r.fecha_ingreso between '$ingreso' and '$salida') or (r.fecha_salida between '$ingreso' and '$salida')) and h.tipo='$tipo' and camas='$cama'";
    $res=mysqli_query($con, $sql);
    if($resul=mysqli_fetch_array($res))
    {
        $msg="ocupada";
        $sw=1;
    }
    else{
        $msg="disponible";
        $sw=0;
    }
    include ('cerrar_conexion.php');
    ?>
    <div id="home" class="w3ls-banner">
    <!-- banner-text -->
    <div class="slider">
        <div class="callbacks_container">

                    <div class="w3layouts-banner-top">

                        <div class="container">
                            <div class="agileits-banner-info">
                                <h4><?php echo $msg;?></h4>
                                <h3>La habitacion se encuentra <?php echo $msg;?></h3>
                            </div>	
                        </div>
                    </div>                
        </div>
        <div class="clearfix"> </div>
        <!--banner Slider starts Here-->
    </div>
</div>	
<!-- //banner --> 
<!--//Header-->
<div id="availability-agileits">
<div class="col-md-12 book-form-left-w3layouts">
    <?php
    include ('conexion.php');

    $sql1="select * from hotelcibeles.habitacion where tipo='$tipo' and camas='$cama'";
    $res2=mysqli_query($con, $sql1);
    $resul2=mysqli_fetch_array($res2);
    $idhab=$resul2['id'];

    $sql="select * from procesocondicion where codFlujo='$f' and codProceso='$p'";
        $res1=mysqli_query($con, $sql);
        $resul1=mysqli_fetch_array($res1);
        $procesoSI=$resul1['codProcesoSI'];
        $procesoNo=$resul1['codProcesoNO'];
    if ($sw==0)
    {
        
    ?>  
        <form action="motor.php" method="GET">
        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
        <input type="hidden" name='codProceso' value="<?php echo $procesoSI;?>">
        <input type="hidden" name='habitacion' value="<?php echo $idhab;?>">
        <input type="hidden" name='ingreso' value="<?php echo $ingreso;?>">
        <input type="hidden" name='salida' value="<?php echo $salida;?>">
        <h2><input type="submit" value="SOLICITAR RESERVA" name="btnReserva"></h2>
        </form>
    <?php
    }
    else {   
    ?>
        <form action="motor.php" method="GET">
        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
        <input type="hidden" name='codProceso' value="<?php echo $procesoNo;?>">
    <h2><input type="submit" value="ENTIENDO" name="btnOK"></h2>
    </form>
    <?php
    }
    ?> 
</div>
            <div class="clearfix"> </div>
</div>