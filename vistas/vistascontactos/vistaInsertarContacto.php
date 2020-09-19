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

<div style="background:white">
    <!--Estilo para h3-->
    <style type="text/css">
        h3 {
            color: white;	
        }	
    </style>	
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h3 style="color:white">REGISTRA UN CONTACTO</h3>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <form role="form" style="background-color: #1E1961; width:80%; height: 15cm; margin: auto"  
              method="POST" action="Controlador.php" id="formRegistro">

            <label style="color:white">NÚMERO DE DOCUMENTO DEL CONTACTO:</label>
            <input type="number" name="IdContacto" class="form-control" required="" placeholder="DOCUMENTO"
                   id=""
                   value= 
                   <?php if (isset($erroresValidacion['datosViejos']['IdContacto']))
                         echo "\"" . $erroresValidacion['datosViejos']['IdContacto'] . "\"";
                            if(isset($_SESSION['IdContacto'])) echo $_SESSION['IdContacto']; unset($_SESSION['IdContacto']);?> >
            <div>
                <?php if (isset($erroresValidacion['mensajesError']['IdContacto']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['IdContacto'] . "</font>";
                ?> 
            </div>
           

            <br>    
            <br>
                    <label style="color:white">NOMBRES DEL CONTACTO:</label> <span style=" color:white"> </span> <svg onclick="info()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg>
            <input type="text" name="ConNombres" class="form-control"id="" placeholder="NOMBRE" required=""
                   value= <?php if (isset($erroresValidacion['ConNombres']['ConNombres']))
                    echo "\"" . $erroresValidacion['datosViejos']['ConNombres'] . "\"";
                if(isset($_SESSION['ConNombres'])) echo $_SESSION['ConNombres']; unset($_SESSION['ConNombres']); 
            if(isset($_SESSION['ConNombres'])) echo $_SESSION['ConNombres']; unset($_SESSION['ConNombres']);?> >       
            <div>
                <?php  if (isset($erroresValidacion['mensajesError']['ConNombres']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ConNombres'] . "</font>";
                ?> 
            </div>
            <br><br>
                    <label style="color:white" >APELLIDOS DEL CONTACTO:</label> <span style=" color:white">  </span> <svg onclick="infoa()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/> 
                    </svg>
            
            <input type="text" name="ConApellidos" class="form-control" id="" placeholder="APELLIDO" required=""

                   value=<?php  if (isset($erroresValidacion['ConApellidos']['ConApellidos']))
                    echo "\"" . $erroresValidacion['datosViejos']['ConApellidos'] . "\"";
                    if(isset($_SESSION['ConApellidos'])) echo $_SESSION['ConApellidos']; unset($_SESSION['ConApellidos']); 
                ?> 
                   >
            <div>
<?php  if (isset($erroresValidacion['mensajesError']['ConApellidos']))
    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ConApellidos'] . "</font>";
?> 
            </div>
            <br>
            <br>
            <label style="color:white" >CORREO DEL CONTACTO:</label>
            <input onclick="correo()" type="email" name="ConCorreo" class="form-control" id=""  placeholder="CORREO"  
                   value=<?php  if (isset($erroresValidacion['ConCorreo']['ConCorreo']))
                    echo "\"" . $erroresValidacion['datosViejos']['ConCorreo'] . "\"";
                    if(isset($_SESSION['ConCorreo'])) echo $_SESSION['ConCorreo']; unset($_SESSION['ConCorreo']); 
                ?> 
                   >
            <div>
<?php  if (isset($erroresValidacion['mensajesError']['ConCorreo']))
    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ConCorreo'] . "</font>";
?> 
<br>
<br>
</div>    
            <fieldset>
                <label style="color:white">SELECIONE EL ROL DEL CONTACTO:</label>    

                <select id="rolcontacto_Idrolcontacto" name="rolcontacto_Idrolcontacto">               
                    <?php
                    for ($j = 0; $j < $cantRoles; $j++) {
                        ?>
                        <option value="<?php  echo $registroRolContactos[$j]->Idrolcontacto; ?>"><?php  echo $registroRolContactos[$j]->Idrolcontacto . "--" . $registroRolContactos[$j]->Nomrol; ?></option>
<?php  } ?>
                </select> 
            </fieldset>
            <br><br>

            
            <button type="submit" name="ruta" value="insertarContacto">Agregar Contacto</button>
        </form>
    </div>
</div>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	


