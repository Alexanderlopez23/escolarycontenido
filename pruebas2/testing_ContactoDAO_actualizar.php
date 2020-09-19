<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH.'modelos/modeloContacto/contactoDAO.php';


$registro=array(); /**Array para capturar datos de un formulario***/
/*SIMULAMOS DATOS QUE VIENEN DE UN FORMULARIO CON METODO POST/****/

//--AQUI LOS CAMBIOS EN LA BASE //

$_POST['IdContacto']=4790;
$_POST['ConNombres']="JeiSSon";
$_POST['ConApellidos']="Lopez"; // <--AQUI EL CAMBIO EN BASE //
$_POST['ConCorreo']="jeissonalexer23@hotmail.com";
$_POST['Idrolcontacto']=2;

/*******************************************************************/
/*SIMULAMOS DATOS QUE VIENEN DE UN FORMULARIO CON METODO POST/****/

$registro['IdContacto']=$_POST['IdContacto'];
$registro['ConNombres']=$_POST['ConNombres'];
$registro['ConApellidos']=$_POST['ConApellidos'];
$registro['ConCorreo']=$_POST['ConCorreo']; 
$registro['Idrolcontacto']=$_POST['Idrolcontacto'];         

/*******************************************************************/

$actualizar =new contactoDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$actualizaContacto=$actualizar->actualizar($registro);

echo"<pre";
print_r($actualizaContacto);    
echo"</pre";    
    
//Ya no necesita mas !!

