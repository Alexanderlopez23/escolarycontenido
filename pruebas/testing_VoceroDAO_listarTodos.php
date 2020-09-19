<?php

include_once '../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloVoceros/voceroDAO.php';

$voceros=new voceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
$listadovoceros=$voceros->seleccionarTodos();

echo "<pre>";
print_r($listadovoceros);
echo "</pre>";

//Ya no necesita mas !!