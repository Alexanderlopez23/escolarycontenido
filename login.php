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
        <link rel="stylesheet" type="text/css" href="css/css.css">
        <script type="text/javascript" src="javascript/funciones.js" defer></script>
        <script type="text/javascript" src="javascript/md5.js"></script>   
        <link rel="shortcut icon" href="imagenes/Favicon.ico">
    </head>
    <body>

        <div class="login-box">
            <h1> INICIAR SESIÓN </h1>
            <form role="form" method="POST" action="Controlador.php" name="formLogin">
                <!--User name -->
                <Label for="username"> USUARIO </Label>	
                <input type="text" value="" id="InputCorreo" name="email" placeholder="CORREO" autofocus >
                <!-- Password -->
                <Label for="Password"> CONTRASEÑA </Label>

                <input type="Password" value="" id="InputPassword" name="password" placeholder="CONTRASEÑA ">

                <input type="button" value="Ingresar" onclick="validar_logueo()" name="" value="Ingresar" >
                <br>
                <br>
                <input type="hidden" name="ruta" value="gestionDeAcceso">
                <br>
                <label>¿No tienes usuario?</label>
                <a  onclick="invitado();" href="registro.php"> REGISTRATE </a>
            </form>
        </div>

        <script type="text/javascript">
            function invitado()
            {
                alert("Se registrara como un usuario invitado mientras el desarrollador define sus funciones en el sistema de informacion");
            }
        </script>
    </body>
</html>