<?php

include_once '../modelos/ConstantesConexion.php';
include_once PATH.'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloContacto/contactoDAO.php';

/******SIMULAMOS DATOS QUE VIENEN DE UN FORMULARIO CON MÉTODO POST******/
$_POST['IdContacto']=4790;
$_POST['ConNombres']="Pocers";
$_POST['ConApellidos']="Lopez";
$_POST['ConCorreo']="jl@gmail.com";
$_POST['rolcontacto_Idrolcontacto']=4;
/********************************************************************/
$registro=array();/**Array para capturar datos de un formulario***/
/********************************************************************/
/******SIMULAMOS CAPTURAR LOS DATOS QUE VIENEN DESDE UN FORMULARIO CON MÉTODO POST*/
$registro['IdContacto']=$_POST['IdContacto'];
$registro['ConNombres']=$_POST['ConNombres'];
$registro['ConApellidos']=$_POST['ConApellidos'];
$registro['ConCorreo']=$_POST['ConCorreo'];
$registro['rolcontacto_Idrolcontacto']=$_POST['rolcontacto_Idrolcontacto'];
/*******************************************************************/

$objInsertar=new contactoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$insertarContactos=$objInsertar->insertar($registro);

echo "<pre>";
print_r($insertarContactos);
echo "</pre>";


//Ya no necesita mas !!
