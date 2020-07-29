    <?php
    $numtar=$_GET['numtar'];
    $idres=$_GET['reserva'];
    $clave=$_GET['clave'];
    $monto=$_GET['monto'];

    include('conexion.php');
    $sql="select * from banco.cuentabancaria where num_tarjeta='$numtar' and clave='$clave'";
    $res=mysqli_query($con, $sql);
    if($resul=mysqli_fetch_array($res))
    {
        $saldo=$resul['saldo'];
        if ($saldo>=$monto)
        {
            $msg="pago exitoso";
            $msg2="La reserva de la habitacion se llevó de manera exitosa, gracias por confiar en CIBELES HOTEL!!";
            $sw=1;
        }
        else {
            $msg="saldo insuficiente";
            $msg2="su saldo es insuficiente para realizar la reserva";
            $sw=0;
        }
    }
    else{
        $msg="Datos de tarjeta Erroneos";
        $msg2="Los datos ingresados no corresponden a una tarjeta existente";
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
                                <h3><?php echo $msg2;?></h3>
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

    $sql="select * from procesocondicion where codFlujo='$f' and codProceso='$p'";
    $res1=mysqli_query($con, $sql);
    $resul1=mysqli_fetch_array($res1);
    $procesoSI=$resul1['codProcesoSI'];
    $procesoNO=$resul1['codProcesoNO'];

    if ($sw==1)
    {
        $sql1="update hotelcibeles.reserva set estado=\"confirmado\" where nro_res='$idres'";
        mysqli_query($con, $sql1);

        $sql2="update banco.cuentabancaria set saldo=saldo-'$monto' where num_tarjeta=$numtar";
        mysqli_query($con, $sql2);
    ?>
        <form action="motor.php" method="GET">
        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
        <input type="hidden" name='codProceso' value="<?php echo $procesoSI;?>">
        <input type="hidden" name='idres' value="<?php echo $idres;?>">
        <h2><input type="submit" value="COMPROBANTE" name="btnCompr"></h2>
        </form>
    <?php
    }
    else { 
    ?>
      <form action="motor.php" method="GET">
        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
        <input type="hidden" name='codProceso' value="<?php echo $procesoNO;?>">
        <input type="hidden" name='idres' value="<?php echo $idres;?>"> 
        <h2><input type="submit" value="ENTIENDO" name="btnEntiendo"></h2> 
    </form>
    <?php
    }
    ?> 
</div>
            <div class="clearfix"> </div>
</div>