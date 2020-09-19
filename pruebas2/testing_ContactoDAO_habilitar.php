<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloContacto/contactoDAO.php';

$cambiarEstadoContacto= new contactoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$habilitarcontacto=$cambiarEstadoContacto->habilitar(array(1));


echo "<pre>";
print_r($habilitarcontacto);
echo "</pre>";