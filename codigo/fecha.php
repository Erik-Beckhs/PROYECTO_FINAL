<?php
    $tipo=$_GET['tipohab'];
?>
<section class="contact-w3ls" id="contact">
	<div class="container">
        <div class="cont">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>INGRESE LAS FECHAS</h4>
                <p class="contact-agile2">Introduzca fechas para su estadía</p>
                <p class="contact-agile2"><?php echo $tipo;?></p>
                </br>
                </br>
				<form  method="GET" action="motor.php">
                    <div class="control-group form-group">
                            <label class="contact-p1">Cantidad de camas:</label>
                            <select name="selector" id="name" class="form-control">
                                <option value="simple">1</option>
                                <option value="doble">2</option>
                                <option value="triple">3</option>
                                <option value="cuadruple">4</option>
                            </select>
                            <p class="help-block"></p>     
                    </div>	
					<div class="control-group form-group">
                        
                            <label class="contact-p1">Fecha de ingreso al hotel:</label>
                            <input type="date" class="form-control" name="ingreso" id="name" required >
                            <p class="help-block"></p>     
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Fecha de salida del hotel:</label>
                            <input type="date" class="form-control" name="salida" id="name" required >
							<p class="help-block"></p>
                    </div>    
                        <input type="hidden" name='tipo' value="<?php echo $tipo;?>">
                        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
                        <input type="hidden" name='codProceso' value="<?php echo $ps;?>">
                    <div class="boton">
                        <input type="submit" name="sub" value="Verificar" class="btn btn-primary">	
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</section>