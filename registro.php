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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/formularioregistrocss.css">
        <title>REGISTRARTE</title>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="javascript/md5.js"></script> 
        <link rel="shortcut icon" href="imagenes/Favicon.ico">
    </head>
    <body>
        <form method="POST" action="Controlador.php" id="formRegistro">
            <section class="form-register">
                <h4>REGISTRATE</h4>
                <input class="controls" type="number" name="documento"  placeholder="Numero de documento" value=<?php
                if (isset($erroresValidacion['datosViejos']['documento']))
                    echo "\"" . $erroresValidacion['datosViejos']['documento'] . "\"";
                if (isset($_SESSION['documento']))
                    echo "\"" . $_SESSION['documento'] . "\"";
                unset($_SESSION['documento']);
                ?>>
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
                <input class="controls" type="text" name="nombre"  placeholder="Ingrese su Nombre" value=<?php
                if (isset($erroresValidacion['datosViejos']['nombre']))
                    echo "\"" . $erroresValidacion['datosViejos']['nombre'] . "\"";
                if (isset($_SESSION['nombre'])) {
                    echo "\"" . $_SESSION['nombre'] . "\"";
                    unset($_SESSION['nombre']);
                }
                ?>>
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
                <input class="controls" type="text" name="apellidos"  placeholder="Ingrese su Apellido" value=<?php
                if (isset($erroresValidacion['datosViejos']['apellidos']))
                    echo "\"" . $erroresValidacion['datosViejos']['apellidos'] . "\"";
                if (isset($_SESSION['apellidos'])) {
                    echo "\"" . $_SESSION['apellidos'] . "\"";
                    unset($_SESSION['apellidos']);
                }
                ?>>
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
                <input class="controls" type="email" name="email" id="InputCorreo" placeholder="Ingrese su Correo Electronico" required="required" value=<?php
                if (isset($erroresValidacion['datosViejos']['email']))
                    echo "\"" . $erroresValidacion['datosViejos']['email'] . "\"";
                if (isset($_SESSION['email'])) {
                    echo "\"" . $_SESSION['email'] . "\"";
                    unset($_SESSION['email']);
                }
                ?>>
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
                <input class="controls" type="password" name="password" id="InputPassword"  placeholder="Ingrese su Contraseña" required="required" >
                <input class="controls" type="password" name="password2" placeholder="Confirmar Contraseña" id="InputPassword2">

                <input type="hidden" name="ruta" value="gestionDeRegistro">
                <button class="botons" onclick="valida_registro()"><span>Registrarse</span></button>
                <div style=" padding-top:15px; font-size:85%">
                    Ya está registrado? 
                    <a href="login.php">
                        <span style="color:#1f53c5"> Ingrese Aquí </span>
                    </a>
                </div>
            </section>
            <?php
            if (isset($erroresValidacion))
                $erroresValidacion = NULL;
            ?>
        </form>
    </body>
</html>
