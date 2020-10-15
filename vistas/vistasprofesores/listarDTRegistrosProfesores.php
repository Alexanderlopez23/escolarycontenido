<?php
if (isset($_SESSION['listaDeProfesores'])) {
    $listaDeProfesores = $_SESSION['listaDeProfesores'];
//    unset($_SESSION['listaDeProfesores']);
}


//echo "<pre>";
//print_r($listaDeProfesores);
//echo "</pre>";
?>



<table id="example" class="table-responsive table-bordered table-striped" style="width:100%">
    <thead>
        <tr>
            <th bgcolor="#24303c"> <span style="color:white">DOCUMENTO</span></th> 
            <th bgcolor="#24303c"> <span style="color:white">NOMBRES </span></th> 
            <th bgcolor="#24303c"><span style="color:white">APELLIDOS</span> </th> 
            <th bgcolor="#24303c"><span style="color:white">CORREO</span> </th> 
            <!--<th>Estado</th>--> 
            <th bgcolor="#24303c"><span style="color:white">MATERIA</span> </th> 
            <th bgcolor="#24303c"><span style="color:white">ACTUALIZAR</span> <svg style="color:white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg></th> 
            <th bgcolor="#24303c"><span style="color:white"> Eliminar </span>  <svg style="color:white" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-backspace-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
                </svg></th> 
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($listaDeProfesores as $key => $value) {
            ?>
            <tr>
                <td><?php  echo $listaDeProfesores[$i]->IdProfesor;  ?></td>  
                <td><?php  echo $listaDeProfesores[$i]->ProNombres;  ?></td>  
                <td><?php  echo $listaDeProfesores[$i]->ProApellidos;  ?></td>  
                <td><?php  echo $listaDeProfesores[$i]->ProCorreo;  ?></td>  
                <!--<td>d>-->  
                <td><?php  echo $listaDeProfesores[$i]->NomMat;  ?></td>  
                <td><a class="btn btn-success" href="Controlador.php?ruta=actualizarProfesor&idAct=<?php  echo $listaDeProfesores[$i]->IdProfesor;  ?>">Actualizar</a></td>  
                <td><a class="btn btn-danger" href="Controlador.php?ruta=eliminarProfesor&idAct=<?php  echo $listaDeProfesores[$i]->IdProfesor;  ?>"  onclick="return confirm('Está seguro de eliminar el registro del profesor con número de documento <?php  echo $listaDeProfesores[$i]->IdProfesor;  ?> ?')">Eliminar</a></td>  
            </tr>   
            <?php
            $i++;
        }
        ?>
    </tbody>
</table>

<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
                $(document).ready(function () {
                    $('#example').DataTable();
                });
</script>-->
<!--https://eldesvandejose.com/category/jquery/hacks-y-recursos/el-plugin-datatables-->