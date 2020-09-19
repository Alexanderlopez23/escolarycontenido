<?php
//
//echo"<pre>";
//print_r($_SESSION);
//echo"<pre>";
//
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosProfesor'])) {
    $actualizarDatosProfesor = $_SESSION['actualizarDatosProfesor'];
    unset($_SESSION['actualizarProfesor']);
}
//
if (isset($_SESSION['registroMateriaProfesores'])) {
    $registroMateriaProfesores = $_SESSION['registroMateriaProfesores'];
    $cantMaterias = count($registroMateriaProfesores);
}
if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}
?>



      

                          


<!-- INTEGRANDO FORMULARIO -->

<form method="POST" action="Controlador.php" id="formRegistro"
<section class="form-register">
    <h4> ACTUALIZAR REGISTRO </h4>
<!-- NUMERO DE DOCUMENTO PROFESOR -->
<label>NUMERO DE DOCUMENTO</label>
<input class="controls" type="number" name="IdProfesor" id="IdProfesor" placeholder="Ingrese Numero Documento" readonly=""
    value="<?php
            if (isset($actualizarDatosProfesor->IdProfesor))
            echo $actualizarDatosProfesor->IdProfesor;
            if (isset($erroresValidacion['datosViejos']['IdProfesor']))
            echo $erroresValidacion['datosViejos']['IdProfesor'];
            if (isset($_SESSION['IdProfesor']))
            echo $_SESSION['IdProfesor'];
            unset($_SESSION['IdProfesor']);
            ?>">
                    

    <!-- NOMBRE DEL PROFESOR -->    
<label>NOMBRE DEL PROFESOR</label>
    <input class="controls" type="text" name="ProNombres" required="" id="ProNombres" placeholder="INGRESE NOMBRE DEL PROFESOR" 
           value="<?php
            if (isset($actualizarDatosProfesor->ProNombres))
            echo $actualizarDatosProfesor->ProNombres;
            if (isset($erroresValidacion['datosViejos']['ProNombres']))
            echo $erroresValidacion['datosViejos']['ProNombres'];
            if (isset($_SESSION['ProNombres']))
            echo $_SESSION['ProNombres'];
            unset($_SESSION['ProNombres']);
            ?>"> 
    
           
    <!-- APELLIDOS DEL PROFESOR -->
<label>APELLIDO DEL PROFESOR</label>    
    <input class="controls" type="text" required="" name="ProApellidos" id="ProApellidos" placeholder="INGRESE APELLIDO DEL PROFESOR"
    value="<?php
            if (isset($actualizarDatosProfesor->ProApellidos))
            echo $actualizarDatosProfesor->ProApellidos;
            if (isset($erroresValidacion['datosViejos']['ProApellidos']))
            echo $erroresValidacion['datosViejos']['ProApellidos'];
            if (isset($_SESSION['ProApellidos']))
            echo $_SESSION['ProApellidos'];
            unset($_SESSION['ProApellidos']);
            ?>"> 
           

    <!-- CORREO DEL PROFESOR -->
    <label>CORREO DEL PROFESOR</label>
    <input class="controls" type="email" required="" name="ProCorreo" id="ProCorreo" placeholder="INGRESE CORREO DEL PROFESOR"
    value="<?php
            if (isset($actualizarDatosProfesor->ProCorreo))
            echo $actualizarDatosProfesor->ProCorreo;
            if (isset($erroresValidacion['datosViejos']['ProCorreo']))
            echo $erroresValidacion['datosViejos']['ProCorreo'];
            if (isset($_SESSION['ProCorreo']))
            echo $_SESSION['ProCorreo'];
            unset($_SESSION['ProCorreo']);
            ?>">     

    
<!--SELECT -->
<label>MATERIA DEL PROFESOR</label>

        <select id="materias_IdMateria" name="materias_IdMateria" class="controls" >  
            <?php
            for ($j = 0; $j < $cantMaterias; $j++) {
                ?>                        
                <option value = "<?php echo $registroMateriaProfesores[$j]->IdMateria; ?>" 
                <?php
                /* PARA REVISAR EN INSERTS */
                if (isset($registroMateriaProfesores[$j]->IdMateria) && isset($actualizarDatosProfesor->materias_IdMateria) && ($registroMateriaProfesores[$j]->IdMateria == $actualizarDatosProfesor->materias_IdMateria)) {
                    echo "selected";
                }
                ?>                                       

                            > <?php echo $registroMateriaProfesores[$j]->IdMateria . " - " . $registroMateriaProfesores[$j]->NomMat; ?>  </option> 
                        <?php
                    }
                    ?>                             
        </select> 

    <button type="submit" class="botons" name="ruta" value="confirmarActualizarProfesor">Actualizar</button>
            
</form>




