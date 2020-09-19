<?php

include_once '../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloContacto/contactoDAO.php';

$contactos=new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadocontactos=$contactos->seleccionarTodos();

echo "<pre>";
print_r($listadocontactos);
echo "</pre>";

//Ya no necesita mas !!