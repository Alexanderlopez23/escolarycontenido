<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloVoceros/voceroDAO.php';


$hallarVocero = new voceroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$voceroHallado=$hallarVocero->seleccionarId(array(456));

echo "<pre>";
print_r($voceroHallado);
echo "</pre>";

//Ya no necesita mas !!
