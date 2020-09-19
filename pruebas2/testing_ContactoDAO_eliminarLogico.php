<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloContacto/contactoDAO.php';

$cambiarEstadoContacto = new contactoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);
$eliminacionlogicaContacto=$cambiarEstadoContacto->eliminarLogico(array(1));
//RECORDAR QUE EN EL ARRAY SE ESPECIFICA QUE ARRAY SE QUIERE DESACTIVAR

echo"<pre>";
print_r($eliminacionlogicaContacto);
echo"</pre>";


//Ya no necesita mas !!
