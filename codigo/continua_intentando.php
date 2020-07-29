<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Continua intentando</title>
</head>
<body>
<?php
$idres=$_GET['idres'];

include('conexion.php');
$sql="select * from procesocondicion where codFlujo='$f' and codProceso='$p'";
$res=mysqli_query($con, $sql);
$resul=mysqli_fetch_array($res);
$pSI=$resul['codProcesoSI'];
$pNO=$resul['codProcesoNO'];
if(is_null($pNO))
{
    $pNO='P1';
}
?>
         <div class="plans-section" id="rooms">
				 <div class="container"> 
				    <h3 class="title-w3-agileits title-black-wthree">¿Que desea Hacer?</h3>
                    <div class="priceing-table-main">
				    <div class="col-md-3 price-grid">
					    <div class="price-block agile">
						    <div class="price-gd-top">
						    <img src="images/r1.jpg" alt=" " class="img-responsive" />
							<h4>Intentar de Nuevo</h4>
						    </div>
						    <div class="price-gd-bottom">
							    <div class="price-selet">
                                    <form action="motor.php" method="GET">
                                        <input type="hidden" name='idres' value="<?php echo $idres;?>">
                                        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
                                        <input type="hidden" name='codProceso' value="<?php echo $pSI;?>">
                                        <h2><input type="submit" value="Elegir" name="btnBus"></h2>	
                                    </form>					
                                </div>
                            </div>
                        </div>
                    </div>
				<div class="col-md-3 price-grid wthree lost">
					<div class="price-block agile">
						<div class="price-gd-top ">
							<img src="images/r3.jpg" alt=" " class="img-responsive" />
							<h4>Salir</h4>
						</div>
						<div class="price-gd-bottom">
							<div class="price-selet">
								<form action="controlador_guardainfo.php" method="GET">
									<input type="hidden" name='idres' value="<?php echo $idres;?>">
                                    <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
                                    <input type="hidden" name='codProceso' value="<?php echo $p;?>">
                                    <h2><input type="submit" value="Elegir" name="btnHab"></h2>	
                                </form>	
							</div>
						</div>
					</div>
				
                </div>
				<div class="clearfix"> </div>
			</div>
		</div>
</body>
</html>