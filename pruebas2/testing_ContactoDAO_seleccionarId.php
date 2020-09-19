<?php
include_once '../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloContacto/contactoDAO.php';


$hallarContacto = new contactoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$contactoHallado=$hallarContacto->seleccionarId(array(55));

echo "<pre>";
print_r($contactoHallado);
echo "</pre>";

//Ya no necesita mas !!
