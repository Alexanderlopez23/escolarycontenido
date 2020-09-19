<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloVoceros/voceroDAO.php';


$eliminarVocero = new voceroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$voceroeliminado=$eliminarVocero->eliminar(array(123));

echo"<pre";
print_r($voceroeliminado);    
echo"</pre";    

//Elimina un registro de acuerdo al selecionado lo elimina completo
//Ya no necesita mas !!
    