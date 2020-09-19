<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion']; 
    unset($_SESSION['erroresValidacion']);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        
        <title>REGISTRARTE</title>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script> 
        <link rel="shortcut icon" href="imagenes/Favicon.ico">
    </head>
    
    <style>
        
    .login-box {
    width: 320px;
    height: 420px;
    background: #000;
    color: #fff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 70px 30px;
}  
 
body {
    margin: 0;
    padding: 0;
    background-color:#198282;
    background-size: cover;
    font-family: sans-serif;
    height: 100vh;
}
        
        
    </style>
    
    
    <body>
        <div>
<!--            <h3 style="color:white"> <center> REGISTRO </center> </h3>-->
        </div>
        <div>
            <form class="login-box" method="POST" action="Controlador.php" id="formRegistro">
                <h5 style="margin-top:-40px">REGISTRATE:</h5>
                <div><br>
                        <input placeholder="Documento" class="form-control" name="documento" type="number" required="required" autofocus
                               value=<?php
                               if (isset($erroresValidacion['datosViejos']['documento']))
                                   echo "\"".$erroresValidacion['datosViejos']['documento']."\"";
                               if (isset($_SESSION['documento']))
                                   echo "\"".$_SESSION['documento']."\"";
                               unset($_SESSION['documento']);
                               ?>
                               >
                        <div>
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['documento']))
                               echo "<font color='red'>" . $erroresValidacion['marcaCampo']['documento'] . "</font>";
                               ?>
                               <?php
                               if (isset($erroresValidacion['mensajesError']['documento']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['documento'] . "</font>";
                               ?>  
                        </div>
                    </div>
                    <div>
                         <br>
                        <input placeholder="Nombres" class="form-control" name="nombre" type="text"   required="required"
                               value=<?php
                               if (isset($erroresValidacion['datosViejos']['nombre']))
                                   echo "\"".$erroresValidacion['datosViejos']['nombre']."\"";
                               if (isset($_SESSION['nombre'])){
                                   echo "\"".$_SESSION['nombre']."\"";
                               unset($_SESSION['nombre']);}
                               ?>
                               >
                        <div>
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['nombre']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['nombre'] . "</font>";
                               ?>                                        
                               <?php
                               if (isset($erroresValidacion['mensajesError']['nombre']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['nombre'] . "</font>";
                               ?>
                        </div>
                    </div>
                    <div>
                         <br>
                        <input placeholder="Apellidos" class="form-control" name="apellidos" type="text"  required="required"
                               value=<?php
                               if (isset($erroresValidacion['datosViejos']['apellidos']))
                                   echo "\"".$erroresValidacion['datosViejos']['apellidos']."\"";
                               if (isset($_SESSION['apellidos'])){
                                   echo "\"".$_SESSION['apellidos']."\"";
                               unset($_SESSION['apellidos']);}
                               ?>
                               >
                        <div>
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['apellidos']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['apellidos'] . "</font>";
                               ?>
                               <?php
                               if (isset($erroresValidacion['mensajesError']['apellidos']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['apellidos'] . "</font>";
                               ?>
                        </div>
                    </div>
                    <div>
                         <br>
                        <input id="InputCorreo" class="form-control" placeholder="Correo Electrónico" name="email" type="email"  required="required"
                               value=<?php
                               if (isset($erroresValidacion['datosViejos']['email']))
                                   echo "\"".$erroresValidacion['datosViejos']['email']."\"";
                               if (isset($_SESSION['email'])){
                                   echo "\"".$_SESSION['email']."\"";
                               unset($_SESSION['email']);}
                               ?>
                               >
                        <div>
                               <?php
                               if (isset($erroresValidacion['marcaCampo']['email']))
                                   echo "<font color='red'>" . $erroresValidacion['marcaCampo']['email'] . "</font>";
                               ?>
                               <?php
                               if (isset($erroresValidacion['mensajesError']['email']))
                                   echo "<font color='red'>" . $erroresValidacion['mensajesError']['email'] . "</font>";
                               ?>
                        </div>
                    </div>
                    <div>
                         <br>
                        <input id="InputPassword" class="form-control" placeholder="Password" name="password" type="password" value=""  required="required">
                    </div>
                    <div>
                         <br>
                        <input id="InputPassword2" class="form-control" placeholder="Confirmar Password" name="password2" type="password" value="">
                    </div>
                    <input type="hidden" name="ruta" value="gestionDeRegistro">
                    <br>
                    <button onclick="valida_registro()"><span style="color:black"> Registrarse </span></button>
                
                <div>
                    <br>
                    <div style=" padding-top:15px; font-size:85%">
                        Ya está registrado? 
                        <a href="login.php">
                            <span style="color:black"> Ingrese Aquí </span>
                        </a>
                    </div>
                </div>
                <?php
                if (isset($erroresValidacion))
                    $erroresValidacion = NULL;
                ?>
            </form>
        </div>
    </body>
</html>

