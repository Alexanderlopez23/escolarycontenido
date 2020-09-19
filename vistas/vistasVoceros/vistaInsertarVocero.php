<?php
//echo"<pre>";
//print_r($_SESSION);
//echo"</pre>";

if (isset($_SESSION['registroCursoVoceros'])) {
    $registroCursoVoceros = $_SESSION['registroCursoVoceros'];
    $cantCursos = count($registroCursoVoceros);
}

if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}

//if (isset($_SESSION['erroresValidacion'])) {
//    $erroresValidacion = $_SESSION['erroresValidacion'];
//    unset($_SESSION['erroresValidacion']);
//}
?>
<form method="POST" action="Controlador.php" id="formRegistro"
<section class="form-register">
    <h4>REGISTRA UN VOCERO</h4>
<!-- NUMERO DE DOCUMENTO VOCERO -->
<input class="controls" type="number" name="IdVoceros" required="" id="IdVoceros" placeholder="Ingrese Numero Documento"
    value=<?php
                if (isset($erroresValidacion['datosViejos']['IdVoceros']))
                    echo "\"" . $erroresValidacion['datosViejos']['IdVoceros'] . "\"";
                    if (isset($_SESSION['IdVoceros']))
                        echo $_SESSION['IdVoceros'];
                        unset($_SESSION['IdVoceros']);
            ?> >
                <div>
                <?php
                    if (isset($erroresValidacion['mensajesError']['IdVoceros']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['IdVoceros'] . "</font>";
                ?> 
                </div>    
   
    
    
    <!-- NOMBRE DEL VOCERO -->    
    <input class="controls" type="text" name="VocNombres"required="" id="VocNombres" placeholder="INGRESE NOMBRE VOCERO" 
           value=<?php
           if (isset($erroresValidacion['VocNombres']['VocNombres']))
                echo "\"" . $erroresValidacion['datosViejos']['VocNombres'] . "\"";
           if (isset($_SESSION['VocNombres']))
                echo $_SESSION['VocNombres'];
                    unset($_SESSION['VocNombres']);
                        if (isset($_SESSION['VocNombres']))
                        echo $_SESSION['VocNombres'];
                        unset($_SESSION['VocNombres']);
                    ?> >       
                    <div>
                        <?php
                            if (isset($erroresValidacion['mensajesError']['VocNombres']))
                            echo "<font color='white'>" . $erroresValidacion['mensajesError']['VocNombres'] . "</font>";
                        ?> 
                    </div>       
    
    <!-- APELLIDOS DEL VOCERO -->    
    <input class="controls" type="text" name="VocApellidos" required="" id="VocApellidos" placeholder="INGRESE APELLIDO DEL VOCERO"
    value=<?php
            if (isset($erroresValidacion['VocApellidos']['VocApellidos']))
                echo "\"" . $erroresValidacion['datosViejos']['VocApellidos'] . "\"";
                if (isset($_SESSION['VocApellidos']))
                    echo $_SESSION['VocApellidos'];
                        unset($_SESSION['VocApellidos']);
            ?>>
                    <div>
                         <?php
                            if (isset($erroresValidacion['mensajesError']['VocApellidos']))
                                echo "<font color='white'>" . $erroresValidacion['mensajesError']['VocApellidos'] . "</font>";
                          ?> 
                    </div>
            
           

              
        
    <!-- CORREO DEL VOCERO -->
    <input class="controls" type="email" required="" name="VocCorreo" id="VocCorreo" placeholder="INGRESE CORREO DEL VOCERO"
    value=<?php
        if (isset($erroresValidacion['VocCorreo']['VocCorreo']))
            echo "\"" . $erroresValidacion['datosViejos']['VocCorreo'] . "\"";
                if (isset($_SESSION['VocCorreo']))
                    echo $_SESSION['VocCorreo'];
                        unset($_SESSION['VocCorreo']);
            ?>>
                    <div>
                        <?php
                            if (isset($erroresValidacion['mensajesError']['VocCorreo']))
                             echo "<font color='white'>" . $erroresValidacion['mensajesError']['VocCorreo'] . "</font>";
                        ?>                

                    </div>       

<!--SELECT -->        
    <h6>CURSO DEL VOCERO </h6>
    <select id="curso_IdCurso" class="controls" name="curso_IdCurso">   

        <?php
        for ($j = 0; $j < $cantCursos; $j++) {
            ?>
            <option value="<?php echo $registroCursoVoceros[$j]->IdCurso; ?>"><?php echo $registroCursoVoceros[$j]->IdCurso . "--" . $registroCursoVoceros[$j]->CurNum; ?></option>
        <?php } ?>

    </select>

    <button class="botons"  name="ruta" type="submit" value="insertarVocero">insertar Vocero</button>
</form>