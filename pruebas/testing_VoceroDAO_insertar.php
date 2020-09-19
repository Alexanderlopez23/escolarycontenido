<?php

include_once '../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloVoceros/voceroDAO.php';

/******SIMULAMOS DATOS QUE VIENEN DE UN FORMULARIO CON MÉTODO POST******/
$_POST['IdVoceros']=467;
$_POST['VocNombres']="Pocers";
$_POST['VocApellidos']="Lo";
$_POST['VocCorreo']="j5l@gmail.com";
$_POST['curso_IdCurso']=4;
/********************************************************************/
$registro=array();/**Array para capturar datos de un formulario***/
/********************************************************************/
/******SIMULAMOS CAPTURAR LOS DATOS QUE VIENEN DESDE UN FORMULARIO CON MÉTODO POST*/
$registro['IdVoceros']=$_POST['IdVoceros'];
$registro['VocNombres']=$_POST['VocNombres'];
$registro['VocApellidos']=$_POST['VocApellidos'];
$registro['VocCorreo']=$_POST['VocCorreo'];
$registro['curso_IdCurso']=$_POST['curso_IdCurso'];
/*******************************************************************/

$objInsertar=new voceroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$insertarVoceros=$objInsertar->insertar($registro);

echo "<pre>";
print_r($insertarVoceros);
echo "</pre>";


//Ya no necesita mas !!
