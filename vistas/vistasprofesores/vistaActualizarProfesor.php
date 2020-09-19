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
                    <h3 style="color:white">ACTUALIZAR  REGISTRO DEL  PROFESOR   </h3>
                </div>
            </div>
        </nav>
    </div>
    <div>
        <form role="form" style="background-color:green; width:80%; height: 15cm; margin: auto"  
              method="POST" action="Controlador.php" id="formRegistro">

            <label style="color:white">NÚMERO DE DOCUMENTO DEL PROFESOR:</label>
            <input type="number" name="IdProfesor" class="form-control" placeholder="DOCUMENTO"
                   id="" readonly=""
            value="<?php
            if (isset($actualizarDatosProfesor->IdProfesor))
            echo $actualizarDatosProfesor->IdProfesor;
            if (isset($erroresValidacion['datosViejos']['IdProfesor']))
            echo $erroresValidacion['datosViejos']['IdProfesor'];
            if (isset($_SESSION['IdProfesor']))
            echo $_SESSION['IdProfesor'];
            unset($_SESSION['IdProfesor']);
            ?>">  
                
                
                
                
<script>

//        function info() {
//            alert('Asegurese de escribir los nombres en mayuscula y pegados ejemplo: JEISSONALEXANDER');
//        }
//        function infoa() {
//            alert('Asegurese de escribir los apellidos en mayuscula y pegados ejemplo:LOPEZLEAL');
//        }
//        function correo() {
//            alert('No deje espacios en este campo puede generar error al completar el registro en el formulario')
//        }
        
</script> 

<br><br>

            <label style="color:white">NOMBRES DEL PROFESOR:</label> <span style=" color:white"> <!--Dame click !! -> --></span> <svg onclick="info()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
            <circle cx="8" cy="4.5" r="1"/>
            </svg>
            <input type="text" name="ProNombres" class="form-control"id="" placeholder="NOMBRE" required=""
            value="<?php
            if (isset($actualizarDatosProfesor->ProNombres))
            echo $actualizarDatosProfesor->ProNombres;
            if (isset($erroresValidacion['datosViejos']['ProNombres']))
            echo $erroresValidacion['datosViejos']['ProNombres'];
            if (isset($_SESSION['ProNombres']))
            echo $_SESSION['ProNombres'];
            unset($_SESSION['ProNombres']);
            ?>"> 

<br><br>
            <label style="color:white" >APELLIDOS DEL PROFESOR:</label> <span style=" color:white"> <!--Dame click !! -> --> </span> <svg onclick="infoa()" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg"> 
            <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
            <circle cx="8" cy="4.5" r="1"/> 
            </svg>

            <input type="text" name="ProApellidos" class="form-control" id="" placeholder="APELLIDO" required=""
            value="<?php
            if (isset($actualizarDatosProfesor->ProApellidos))
            echo $actualizarDatosProfesor->ProApellidos;
            if (isset($erroresValidacion['datosViejos']['ProApellidos']))
            echo $erroresValidacion['datosViejos']['ProApellidos'];
            if (isset($_SESSION['ProApellidos']))
            echo $_SESSION['ProApellidos'];
            unset($_SESSION['ProApellidos']);
            ?>"> 
<br> 
<br>
            <label style="color:white" >CORREO DEL PROFESOR:</label>
            <input onclick="correo()" type="email" name="ProCorreo" class="form-control" id=""  placeholder="CORREO"  
            value="<?php
            if (isset($actualizarDatosProfesor->ProCorreo))
            echo $actualizarDatosProfesor->ProCorreo;
            if (isset($erroresValidacion['datosViejos']['ProCorreo']))
            echo $erroresValidacion['datosViejos']['ProCorreo'];
            if (isset($_SESSION['ProCorreo']))
            echo $_SESSION['ProCorreo'];
            unset($_SESSION['ProCorreo']);
            ?>"> 
<br>
<br>

            <label style="color:white">SELECIONE LA MATERIA QUE DICTA EL PROFESOR:</label>    

            <select id="materias_IdMateria" name="materias_IdMateria">  
            <?php
                for ($j = 0; $j < $cantMaterias; $j++) {
            ?>                        
            <option value = "<?php   echo $registroMateriaProfesores[$j]->IdMateria; ?>" 
            <?php
 /*PARA REVISAR EN INSERTS */           
            if (isset($registroMateriaProfesores[$j]->IdMateria) && isset($actualizarDatosProfesor->materias_IdMateria) && ($registroMateriaProfesores[$j]->IdMateria == $actualizarDatosProfesor->materias_IdMateria)) {
            echo "selected";
            }
            ?>                                       

            > <?php  echo $registroMateriaProfesores[$j]->IdMateria . " - " . $registroMateriaProfesores[$j]->NomMat; ?>  </option> 
            <?php
            }
            ?>                            
            </select> 
            <br>
            <br>
            <button type="submit" name="ruta" value="confirmarActualizarProfesor">Actualizar</button>    
         </form>
   </div>
</div>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript --> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>	


