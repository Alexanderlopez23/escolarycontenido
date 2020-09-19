<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloContacto/contactoDAO.php';


$eliminarContacto = new contactoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$contactoeliminado=$eliminarContacto->eliminar(array(55));

echo"<pre";
print_r($contactoeliminado);    
echo"</pre";    

//Elimina un registro de acuerdo al selecionado lo elimina completo
//Ya no necesita mas !!
    