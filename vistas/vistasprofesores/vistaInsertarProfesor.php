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
                    <h3 style="color:white">REGISTRA UN PROFESOR</h3>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <form role="form" style="background-color: green; width:80%; height: 15cm; margin: auto"  
              method="POST" action="Controlador.php" id="formRegistro">

            <label style="color:white">NÚMERO DE DOCUMENTO DEL PROFESOR:</label>
            <input type="number" name="IdProfesor" class="form-control" required="" placeholder="DOCUMENTO"
                   id=""
                   value= 
                   <?php  if (isset($erroresValidacion['datosViejos']['IdProfesor']))
                         echo "\"" . $erroresValidacion['datosViejos']['IdProfesor'] . "\"";
                            if(isset($_SESSION['IdProfesor'])) echo $_SESSION['IdProfesor']; unset($_SESSION['IdProfesor']);?> >
            <div>
                <?php  if (isset($erroresValidacion['mensajesError']['IdProfesor']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['IdProfesor'] . "</font>";
                ?> 
            </div>
<!-- <script>

function info() {
    alert ('Asegurese de escribir los nombres en mayuscula y pegados ejemplo: JEISSONALEXANDER');
}
function infoa() {
    alert ('Asegurese de escribir los apellidos en mayuscula y pegados ejemplo:LOPEZLEAL');
}
function correo() {
    alert ('No deje espacios en este campo puede generar error al completar el registro en el formulario')   
}
</script> -->            

            <br>    
            <br>
                    <label style="color:white">NOMBRES DEL PROFESOR:</label> <span style=" color:white"> </span> <svg onclick="info()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/>
                    </svg>
            <input type="text" name="ProNombres" class="form-control" id="" placeholder="NOMBRE" required=""
                   value= 
                    <?php if (isset($erroresValidacion['datosViejos']['ProNombres']))
                    echo "\"" . $erroresValidacion['datosViejos']['ProNombres'] . "\"";
                if(isset($_SESSION['ProNombres'])) echo $_SESSION['ProNombres']; unset($_SESSION['ProNombres']); 
            if(isset($_SESSION['ProNombres'])) echo $_SESSION['ProNombres']; unset($_SESSION['ProNombres']);?> >       
            <div>
                <?php   if (isset($erroresValidacion['mensajesError']['ProNombres']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ProNombres'] . "</font>";
                ?> 
            </div>
                <br><br>
                    <label style="color:white" >APELLIDOS DEL PROFESOR:</label> <span style=" color:white">  </span> <svg onclick="infoa()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
                        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
                        <circle cx="8" cy="4.5" r="1"/> 
                    </svg>
            
            <input type="text" name="ProApellidos" class="form-control" id="" placeholder="APELLIDO" required=""

                   value=<?php if (isset($erroresValidacion['datosViejos']['ProApellidos']))
                    echo "\"" . $erroresValidacion['datosViejos']['ProApellidos'] . "\"";
                    if(isset($_SESSION['ProApellidos'])) echo $_SESSION['ProApellidos']; unset($_SESSION['ProApellidos']); 
                ?> 
                   >
            <div>
<?php if (isset($erroresValidacion['mensajesError']['ProApellidos']))
    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ProApellidos'] . "</font>";
?> 
            </div>
            <br>
            <br>
            <label style="color:white" >CORREO DEL PROFESOR:</label>
            <input onclick="correo()" type="email" name="ProCorreo" class="form-control" id=""  placeholder="CORREO"  
                   value=<?php if (isset($erroresValidacion['datosViejos']['ProCorreo']))
                    echo "\"" . $erroresValidacion['datosViejos']['ProCorreo'] . "\"";
                    if(isset($_SESSION['ProCorreo'])) echo $_SESSION['ProCorreo']; unset($_SESSION['ProCorreo']); 
                ?> 
                   >
            <div>
                <?php  if (isset($erroresValidacion['mensajesError']['ProCorreo']))
                    echo "<font color='white'>" . $erroresValidacion['mensajesError']['ProCorreo'] . "</font>";
                ?> 
<br>
<br>
            </div>    
            <fieldset>
                <label style="color:white">SELECIONE MATERIA QUE DICTA PROFESOR</label>    

                <select id="materias_IdMateria" name="materias_IdMateria">               
                    <?php
                    for ($j = 0; $j < $cantMaterias; $j++) {
                        ?>
                        <option value="<?php   echo $registroMateriaProfesores[$j]->IdMateria; ?>"><?php   echo $registroMateriaProfesores[$j]->IdMateria . "--" . $registroMateriaProfesores[$j]->NomMat; ?></option>
<?php   } ?>
                </select> 
            </fieldset>
            <br><br>

            
            <button type="submit" name="ruta" value="insertarProfesor">Agregar Profesor</button>
        </form>
    </div>
</div>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	


