<?php
//echo"<pre>";
//print_r($_SESSION);
//echo"</pre>";

if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}


if (isset($_SESSION['registroMateriaProfesores'])) {
    $registroMateriaProfesores = $_SESSION['registroMateriaProfesores'];
    $cantMaterias = count($registroMateriaProfesores);
    unset($_SESSION['registroMateriaProfesores']);
}


?>

<!-- INTEGRANDO FORMULARIO -->
<form method="POST" action="Controlador.php" id="formRegistro"
      <section class="form-register">
        <h4>REGISTRA UN PROFESOR</h4>
        <!-- NUMERO DE DOCUMENTO PROFESOR -->
        <input class="controls" type="number" name="IdProfesor" required="" id="IdProfesor" placeholder="Ingrese Numero Documento"
               value=<?php
               if (isset($erroresValidacion['datosViejos']['IdProfesor']))
                   echo "\"" . $erroresValidacion['datosViejos']['IdProfesor'] . "\"";
               if (isset($_SESSION['IdProfesor']))
                   echo $_SESSION['IdProfesor'];
               unset($_SESSION['IdProfesor']);
               ?> >
        <div>
            <?php
            if (isset($erroresValidacion['mensajesError']['IdProfesor']))
                echo "<font color='white'>" . $erroresValidacion['mensajesError']['IdProfesor'] . "</font>";
            ?> 
        </div>   



        <!-- NOMBRE DEL PROFESOR -->    
        <input class="controls" type="text" name="ProNombres"required="" id="ProNombres" placeholder="INGRESE NOMBRE DEL PROFESOR" 
               value=<?php
               if (isset($erroresValidacion['datosViejos']['ProNombres']))
                   echo "\"" . $erroresValidacion['datosViejos']['ProNombres'] . "\"";
               if (isset($_SESSION['ProNombres']))
                   echo $_SESSION['ProNombres'];
               unset($_SESSION['ProNombres']);
               if (isset($_SESSION['ProNombres']))
                   echo $_SESSION['ProNombres'];
               unset($_SESSION['ProNombres']);
               ?> >       
        <div>
            <?php
            if (isset($erroresValidacion['mensajesError']['ProNombres']))
                echo "<font color='white'>" . $erroresValidacion['mensajesError']['ProNombres'] . "</font>";
            ?> 
        </div>



        <!-- APELLIDOS DEL PROFESOR -->    
        <input class="controls" type="text" name="ProApellidos" required="" id="ProApellidos" placeholder="INGRESE APELLIDO DEL PROFESOR"
               value=<?php
               if (isset($erroresValidacion['datosViejos']['ProApellidos']))
                   echo "\"" . $erroresValidacion['datosViejos']['ProApellidos'] . "\"";
               if (isset($_SESSION['ProApellidos']))
                   echo $_SESSION['ProApellidos'];
               unset($_SESSION['ProApellidos']);
               ?> >
        <div>
            <?php
            if (isset($erroresValidacion['mensajesError']['ProApellidos']))
                echo "<font color='white'>" . $erroresValidacion['mensajesError']['ProApellidos'] . "</font>";
            ?> 
        </div>


        <!-- CORREO DEL PROFESOR -->
        <input class="controls" type="email" required="" name="ProCorreo" id="ProCorreo" placeholder="INGRESE CORREO DEL PROFESOR"
               value=<?php
               if (isset($erroresValidacion['datosViejos']['ProCorreo']))
                   echo "\"" . $erroresValidacion['datosViejos']['ProCorreo'] . "\"";
               if (isset($_SESSION['ProCorreo']))
                   echo $_SESSION['ProCorreo'];
               unset($_SESSION['ProCorreo']);
               ?>>
        <div>
            <?php
            if (isset($erroresValidacion['mensajesError']['ProCorreo']))
                echo "<font color='white'>" . $erroresValidacion['mensajesError']['ProCorreo'] . "</font>";
            ?> 

        </div>     


        <!--SELECT -->        
        <h6>MATERIA DEL PROFESOR</h6>
        <select id="materias_IdMateria" name="materias_IdMateria">               
            <?php
            for ($j = 0; $j < $cantMaterias; $j++) {
                ?>
                <option value="<?php echo $registroMateriaProfesores[$j]->IdMateria; ?>"><?php echo $registroMateriaProfesores[$j]->IdMateria . "--" . $registroMateriaProfesores[$j]->NomMat; ?></option>
            <?php } ?>
        </select> 

        <button class="botons" type="submit" name="ruta" value="insertarProfesor">Agregar Profesor</button>
</form>
