<?php
$ingreso=$_GET['ingreso'];
$salida=$_GET['salida'];

$idhab=$_GET['habitacion'];
include ('conexion.php');
$sql1="select * from hotelcibeles.habitacion where id='$idhab'";
$res1=mysqli_query($con, $sql1);
$resul1=mysqli_fetch_array($res1);
$hab=$resul1['tipo'];
$cama=$resul1['camas'];
?>
<section class="contact-w3ls" id="contact">
	<div class="container">
        <div class="cont">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h4>DATOS PERSONALES</h4>
                <p class="contact-agile2">Tipo de Habitacion: <?php echo $hab;?> || Tipo de camas: <?php echo $cama;?>  </p>
                <p class="contact-agile2">A continuación, ingrese sus datos personales para la reserva</p>
                </br>
                </br>
				<form  method="POST" action="controlador_ingresa_datos.php">
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">DNI:</label>
                            <input type="text" class="form-control" name="dni" id="name" required >
                            <p class="help-block"></p>     
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Nombre(s):</label>
                            <input type="text" class="form-control" name="nombre" id="name" required >
                            <p class="help-block"></p>     
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Apellido Paterno:</label>
                            <input type="text" class="form-control" name="paterno" id="name" required >
                            <p class="help-block"></p>     
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Apellido Materno:</label>
                            <input type="text" class="form-control" name="materno" id="name" required >
                            <p class="help-block"></p>     
                    </div>
                    <div class="control-group form-group">
                            <label class="contact-p1">Fecha de Nacimiento:</label>
                            <input type="date" class="form-control" name="fechanac" id="name" required >
                            <p class="help-block"></p>     
                    </div>	
                    <?php

							$countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

							?>
							<div class="control-group form-group">
                                        <label class="contact-p1">Nacionalidad</label>
                                        <select name="pais" class="form-control" required>
											<option value selected ></option>
                                            <?php
											foreach($countries as $key => $value):
											echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
											endforeach;
											?>
                                        </select>
							</div>  
                    <div class="control-group form-group">
                        
                        <label class="contact-p1">Telefono:</label>
                        <input type="phone" class="form-control" name="telefono" id="phone" required >
                        <p class="help-block"></p>
                    </div> 
                    <div class="control-group form-group">
                        
                        <label class="contact-p1">Email:</label>
                        <input type="email" class="form-control" name="email" id="name" required >
                        <p class="help-block"></p>
                    </div> 
                    <div class="control-group form-group">
                            <label class="contact-p1">Regimen de Comidas:</label>
                            <select name="regimen" id="name" class="form-control">
                                <option value="ninguna">Solo Habitacion</option>
                                <option value="desayuno">Desayuno</option>
                                <option value="media pizarra">Media Pizarra</option>
                                <option value="pension completa">Pension Completa</option>
                            </select>
                            <p class="help-block"></p>     
                    </div>
                    
                </div>
                        <input type="hidden" name='idhab' value="<?php echo $idhab;?>">
                        <input type="hidden" name='codFlujo' value="<?php echo $f;?>">
                        <input type="hidden" name='codProceso' value="<?php echo $ps;?>">
                        <input type="hidden" name='ingreso' value="<?php echo $ingreso;?>">
                        <input type="hidden" name='salida' value="<?php echo $salida;?>">
                        
                    <div class="boton">
                        <input type="submit" name="btnEnvDatos" value="Enviar Datos" class="btn btn-primary">	
                    </div>
                    
            </form>
        </div>
    </div>
</section>