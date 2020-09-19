<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloVoceros/voceroDAO.php';

$cambiarEstadoVocero = new voceroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);
$eliminacionlogicaVocero=$cambiarEstadoVocero->eliminarLogico(array(123));
//RECORDAR QUE EN EL ARRAY SE ESPECIFICA QUE ARRAY SE QUIERE DESACTIVAR

echo"<pre>";
print_r($eliminacionlogicaVocero);
echo"</pre>";


//Ya no necesita mas !!
