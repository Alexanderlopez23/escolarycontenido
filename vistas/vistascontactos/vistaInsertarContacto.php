<?php
//echo"<pre>";
//print_r($_SESSION);
//echo"</pre>";

if (isset($_SESSION['erroresValidacion'])) {
    $erroresValidacion = $_SESSION['erroresValidacion'];
    unset($_SESSION['erroresValidacion']);
}


if (isset($_SESSION['registroRolContactos'])) {
    $registroRolContactos = $_SESSION['registroRolContactos'];
    $cantRoles = count($registroRolContactos);
    unset($_SESSION['registroRolContactos']);
}

?>

<!-- INTEGRACION DE FORMULARIO -->

<form method="POST" action="Controlador.php" id="formRegistro"
    <section class="form-register">
    <h4>REGISTRA UN CONTACTO</h4>
    <!-- NUMERO DE DOCUMENTO CONTACTO -->
            <input class="controls" type="number" name="IdContacto" id="IdContacto" placeholder="Ingrese Numero Documento"
                value=<?php if (isset($erroresValidacion['datosViejos']['IdContacto']))
                                echo "\"" . $erroresValidacion['datosViejos']['IdContacto'] . "\"";
                                    if(isset($_SESSION['IdContacto'])) echo $_SESSION['IdContacto']; 
                                        unset($_SESSION['IdContacto']);        
                       ?>>
            <div>
                <?php if (isset($erroresValidacion['mensajesError']['IdContacto']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['IdContacto'] . "</font>";
                ?> 
            </div>   
   
    
    
    <!-- NOMBRE DEL CONTACTO -->    
            <input class="controls" type="text" name="ConNombres" id="ConNombres" placeholder="INGRESE NOMBRE DEL CONTACTO" 
                value=<?php if (isset($erroresValidacion['ConNombres']['ConNombres']))
                                echo "\"" . $erroresValidacion['datosViejos']['ConNombres'] . "\"";
                                    if(isset($_SESSION['ConNombres'])) echo $_SESSION['ConNombres']; 
                                        unset($_SESSION['ConNombres']); 
                                            if(isset($_SESSION['ConNombres'])) echo $_SESSION['ConNombres']; 
                                                unset($_SESSION['ConNombres']);?> >       
            <div>
                <?php  if (isset($erroresValidacion['mensajesError']['ConNombres']))
                            echo "<font color='white'>" . $erroresValidacion['mensajesError']['ConNombres'] . "</font>";
                ?> 
            </div>
      
    
    <!-- APELLIDOS DEL CONTACTO -->    
            <input class="controls" type="text" name="ConApellidos" id="ConApellidos" placeholder="INGRESE APELLIDO DEL CONTACTO"
            value=<?php  if (isset($erroresValidacion['ConApellidos']['ConApellidos']))
                                echo "\"" . $erroresValidacion['datosViejos']['ConApellidos'] . "\"";
                                    if(isset($_SESSION['ConApellidos'])) echo $_SESSION['ConApellidos']; 
                                        unset($_SESSION['ConApellidos']);?>>
            <div>                
                <?php  if (isset($erroresValidacion['mensajesError']['ConApellidos']))
                            echo "<font color='white'>" . $erroresValidacion['mensajesError']['ConApellidos'] . "</font>";
                ?> 
            </div>
           

    <!-- CORREO DEL CONTACTO-->
    <input class="controls" type="correo" name="ConCorreo" id="ConCorreo" placeholder="INGRESE CORREO DEL CONTACTO"
           value=<?php
           if (isset($erroresValidacion['ConCorreo']['ConCorreo']))
               echo "\"" . $erroresValidacion['datosViejos']['ConCorreo'] . "\"";
           if (isset($_SESSION['ConCorreo']))
               echo $_SESSION['ConCorreo'];
           unset($_SESSION['ConCorreo']);
           ?>>
    <div>
<?php
if (isset($erroresValidacion['mensajesError']['ConCorreo']))
    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ConCorreo'] . "</font>";
?> 
    </div>
        
        <!--SELECT -->        
        <h6>ROL DEL CONTACTO</h6>
        <select id="rolcontacto_Idrolcontacto" name="rolcontacto_Idrolcontacto">               
            <?php
            for ($j = 0; $j < $cantRoles; $j++) {
                ?>
                <option value="<?php echo $registroRolContactos[$j]->Idrolcontacto; ?>"><?php echo $registroRolContactos[$j]->Idrolcontacto . "--" . $registroRolContactos[$j]->Nomrol; ?></option>
            <?php } ?>
        </select> 

        <button class="botons"  name="ruta" type="submit" value="insertarContacto">insertar Contacto</button>    
</form>