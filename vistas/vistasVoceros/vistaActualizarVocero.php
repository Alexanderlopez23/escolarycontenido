<?php
//
//echo"<pre>";
//print_r($_SESSION);
//echo"<pre>";


if (isset($_SESSION['registroCursoVoceros'])) {
    $registroCursoVoceros = $_SESSION['registroCursoVoceros'];
    $cantCursos = count($registroCursoVoceros); 
}

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosVocero'])) {
    $actualizarDatosVocero = $_SESSION['actualizarDatosVocero'];
    unset($_SESSION['actualizarVocero']);
}

if (isset($_SESSION['registroCursoVoceros'])) {
    $registroCursoVoceros = $_SESSION['registroCursoVoceros'];
    $cantCursos = count($registroCursoVoceros);
//    unset($_SESSION['registroCursoVoceros']);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>

<!-- FORMULARIO A INTEGRAR -->

<form method="POST" action="Controlador.php" id="formRegistro"
      <section class="form-register">
        <h4> ACTUALIZAR REGISTRO </h4>
        <!-- NUMERO DE DOCUMENTO VOCERO -->
        <label>NUMERO DE DOCUMENTO</label>
        <input class="controls" type="number" name="IdVoceros" id="IdVoceros" placeholder="Ingrese Numero Documento" readonly=""
               value="<?php
               if (isset($actualizarDatosVocero->IdVoceros))
                   echo $actualizarDatosVocero->IdVoceros;
               if (isset($erroresValidacion['datosViejos']['IdVoceros']))
                   echo $erroresValidacion['datosViejos']['IdVoceros'];
               if (isset($_SESSION['IdVoceros']))
                   echo $_SESSION['IdVoceros'];
               unset($_SESSION['IdVoceros']);
               ?>">




        <!-- NOMBRE DEL VOCERO -->    
        <label>NOMBRE DEL VOCERO</label>
        <input class="controls" type="text" name="VocNombres" required="" id="VocNombres" placeholder="INGRESE NOMBRE DEL VOCERO" 
               value="<?php
               if (isset($actualizarDatosVocero->VocNombres))
                   echo $actualizarDatosVocero->VocNombres;
               if (isset($erroresValidacion['datosViejos']['VocNombres']))
                   echo $erroresValidacion['datosViejos']['VocNombres'];
               if (isset($_SESSION['VocNombres']))
                   echo $_SESSION['VocNombres'];
               unset($_SESSION['VocNombres']);
               ?>">

        <!-- APELLIDOS DEL VOCERO -->
        <label>APELLIDO DEL VOCERO</label>    
        <input class="controls" type="text" required="" name="VocApellidos" id="VocApellidos" placeholder="INGRESE APELLIDO DEL VOCERO"
               value="<?php
               if (isset($actualizarDatosVocero->VocApellidos))
                   echo $actualizarDatosVocero->VocApellidos;
               if (isset($erroresValidacion['datosViejos']['VocApellidos']))
                   echo $erroresValidacion['datosViejos']['VocApellidos'];
               if (isset($_SESSION['VocApellidos']))
                   echo $_SESSION['VocApellidos'];
               unset($_SESSION['VocApellidos']);
               ?>">


        <!-- CORREO DEL VOCERO -->
        <label>CORREO DEL VOCERO</label>
        <input class="controls" type="email" required="" name="VocCorreo" id="VocCorreo" placeholder="INGRESE CORREO DEL VOCERO"
               value="<?php
               if (isset($actualizarDatosVocero->VocCorreo))
                   echo $actualizarDatosVocero->VocCorreo;
               if (isset($erroresValidacion['datosViejos']['VocCorreo']))
                   echo $erroresValidacion['datosViejos']['VocCorreo'];
               if (isset($_SESSION['VocCorreo']))
                   echo $_SESSION['VocCorreo'];
               unset($_SESSION['VocCorreo']);
               ?>">      

        <!--SELECT -->
        <label>CURSO DEL VOCERO</label>
        <select id="curso_IdCurso" class="controls" name="curso_IdCurso">
            <?php
            for ($j = 0; $j < $cantCursos; $j++) {
                ?>
                <option value = "<?php echo $registroCursoVoceros[$j]->IdCurso; ?>" 
                <?php
                if (isset($registroCursoVoceros[$j]->IdCurso) && isset($actualizarDatosVocero->curso_IdCurso) && ($registroCursoVoceros[$j]->IdCurso == $actualizarDatosVocero->curso_IdCurso)) {
                    echo "selected";
                }
                ?> 
                        > <?php echo $registroCursoVoceros[$j]->IdCurso . " - " . $registroCursoVoceros[$j]->CurNum; ?>  </option> 
                        <?php
                    }
                    ?>    
        </select>

        <button class="botons"  name="ruta" type="submit" value="confirmarActualizarVocero">Actualizar</button>

</form>




