<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo2.css" type="text/css">
    <title>Login</title>
</head>
<body>
    <?php
           session_start();
           ob_start(); 
           $mensaje="Bienvenido";
           if(isset($_SESSION['sesion_exito']))
           {
                    if($_SESSION['sesion_exito']==0)
                    {
                        $mensaje="Ingrese sus datos";
                    }
                    if($_SESSION['sesion_exito']==2)
                    {
                        $mensaje="Campos Obligatorios";
                    }
                    if($_SESSION['sesion_exito']==3)
                    {
                        $mensaje="Datos erroneos";
                    } 
            }                 
    ?>
    <div class="align">
        <div class="card">
            <div class="head">
                <div></div>
                <a id="login" class="selected" href="#login">HOTEL LA CIBELES</a>
                <div></div>
            </div>
            <div class="tabs">
                <form action="controladorlogin.php" method="POST">
                    <div class="inputs">
                        <div class="input">
                            <input placeholder="Usuario" type="text" name="usuario"><img src="images/user.png">
                        </div>
                        <div class="input">
                            <input placeholder="Clave" type="password" name="clave"><img src="images/pass.png">
                        </div>
                        <input class="boton" type="submit" value="Login" name="btnlogin">
                    </div>
                    <label class="msj"><?php echo $mensaje;?></label>
                </form>
            </div>
        </div>
    </div>
</body>
</html>