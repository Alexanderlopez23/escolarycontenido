<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloVoceros/voceroDAO.php';

$cambiarEstadoVocero= new voceroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$habilitarvocero=$cambiarEstadoVocero->habilitar(array(456));


echo "<pre>";
print_r($habilitarvocero);
echo "</pre>";