<?php
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">	
        <title> INICIAR SESION  </title>
        <!-- LIBRERIA SWEET -->
        <script src="librerias/sweetalert/package/dist/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="librerias/sweetalert/package/dist/sweetalert2.min.css"> 
        <script type="text/javascript" src="javascript/funciones.js" defer></script>
        <script type="text/javascript" src="javascript/md5.js"></script>   
        <link rel="shortcut icon" href="imagenes/Favicon.ico">
        <link rel="stylesheet" href="css/formularioregistrocss.css">
    </head>
    <body>
        <form role="form" method="POST" action="Controlador.php" name="formLogin">
            <section class="form-register">
                <h4> <center>Iniciar Sesión </center></h4>

                <Label for="username"> CORREO ELECTRONICO</Label>
                <br>
                <br>
                <input  class="controls" type="email" value="" id="InputCorreo" name="email" placeholder="CORREO" autofocus >
                <br>

                <Label for="Password"> CONTRASEÑA </Label>
                <br>
                <br>

                <input class="controls" type="Password" value="" id="InputPassword" name="password" placeholder="CONTRASEÑA ">
                <br>

                <input class="botons"type="button" value="Ingresar" onclick="validar_logueo()" name="" value="Ingresar" >
                <br>

                <input type="hidden" name="ruta" value="gestionDeAcceso">
                <br>
                <label>¿No tienes usuario?</label>
                <a  onclick="invitado();" href="registro.php"> REGISTRATE </a>
            </section>
        </form>

        <script languaje="javascript">
           function invitado()  {
               
            $mensaje="Se registrara como un usuario invitado mientras el desarrollador define sus funciones en el software";
               
            alert ( $mensaje );
           }
        </Script>
        <!-- LIBRERIA SWEET -->
    <script src="librerias/sweetalert/package/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="librerias/sweetalert/package/dist/sweetalert2.min.css">    
</body>   
</html>
