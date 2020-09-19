<?php
//
//echo"<pre>";
//print_r($_SESSION);
//echo"<pre>";

if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['actualizarDatosContacto'])) {
    $actualizarDatosContacto = $_SESSION['actualizarDatosContacto'];
    unset($_SESSION['actualizarContacto']);
}

if (isset($_SESSION['registroRolContactos'])) {
    $registroRolContactos = $_SESSION['registroRolContactos'];
    $cantRoles = count($registroRolContactos);
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
<!-- NUMERO DE DOCUMENTO CONTACTO -->
<label>NUMERO DE DOCUMENTO</label>
<input class="controls" type="number" name="IdContacto" id="IdContacto" placeholder="Ingrese Numero Documento" readonly=""
    value="<?php
            if (isset($actualizarDatosContacto->IdContacto))
            echo  $actualizarDatosContacto->IdContacto;
            if (isset($erroresValidacion['datosViejos']['IdContacto']))
            echo $erroresValidacion['datosViejos']['IdContacto'];
            if (isset($_SESSION['IdContacto']))
            echo $_SESSION['IdContacto'];
            unset($_SESSION['IdContacto']);
            ?>">  
                    

    <!-- NOMBRE DEL CONTACTO -->    
<label>NOMBRE DEL CONTACTO</label>
    <input class="controls" type="text" name="ConNombres" id="ConNombres" placeholder="INGRESE NOMBRE DEL CONTACTO" required=""
           value="<?php
            if (isset($actualizarDatosContacto->ConNombres))
            echo $actualizarDatosContacto->ConNombres;
            if (isset($erroresValidacion['datosViejos']['ConNombres']))
            echo $erroresValidacion['datosViejos']['ConNombres'];
            if (isset($_SESSION['ConNombres']))
            echo $_SESSION['ConNombres'];
            unset($_SESSION['ConNombres']);
            ?>">
    
    <!-- APELLIDOS DEL CONTACTO -->
<label>APELLIDO DEL CONTACTO</label>    
    <input class="controls" type="text" name="ConApellidos" id="ConApellidos" placeholder="INGRESE APELLIDO DEL CONTACTO" required=""
    value="<?php
            if (isset($actualizarDatosContacto->ConApellidos))
            echo $actualizarDatosContacto->ConApellidos;
            if (isset($erroresValidacion['datosViejos']['ConApellidos']))
            echo $erroresValidacion['datosViejos']['ConApellidos'];
            if (isset($_SESSION['ConApellidos']))
            echo $_SESSION['ConApellidos'];
            unset($_SESSION['ConApellidos']);
            ?>"> 
           

    <!-- CORREO DEL CONTACTO -->
    <label>CORREO DEL CONTACTO</label>
        <input class="controls" type="email" name="ConCorreo" id="ConCorreo" placeholder="INGRESE CORREO DEL VOCERO"
    value="<?php
            if (isset($actualizarDatosContacto->ConCorreo))
            echo $actualizarDatosContacto->ConCorreo;
            if (isset($erroresValidacion['datosViejos']['ConCorreo']))
            echo $erroresValidacion['datosViejos']['ConCorreo'];
            if (isset($_SESSION['ConCorreo']))
            echo $_SESSION['ConCorreo'];
            unset($_SESSION['ConCorreo']);
            ?>">     

<!--SELECT -->
<label>ROL DEL CONTACTO</label>
<br>
            <select id="rolcontacto_Idrolcontacto" name="rolcontacto_Idrolcontacto">  
                <?php
                for ($j = 0; $j < $cantRoles; $j++) {
                    ?>                        
                    <option value = "<?php echo $registroRolContactos[$j]->Idrolcontacto; ?>" 
                    <?php
                    if (isset($registroRolContactos[$j]->Idrolcontacto) && isset($actualizarDatosContacto->rolcontacto_Idrolcontacto) && ($registroRolContactos[$j]->Idrolcontacto == $actualizarDatosContacto->rolcontacto_Idrolcontacto)) {
                        echo "selected";
                    }
                    ?>                                       

                            > <?php echo $registroRolContactos[$j]->Idrolcontacto . " - " . $registroRolContactos[$j]->Nomrol; ?>  </option> 
                            <?php
                        }
                        ?>                            
            </select> 

    <button class="botons"  name="ruta" type="submit" value="confirmarActualizarContacto">Actualizar</button>
            
</form>