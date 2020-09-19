<?php 

include_once '../modelos/ConstantesConexion.php';
include_once PATH. 'modelos/ConBdMysql.php';
include_once PATH. 'modelos/modeloVoceros/voceroDAO.php';


$registro=array(); /**Array para capturar datos de un formulario***/
/*SIMULAMOS DATOS QUE VIENEN DE UN FORMULARIO CON METODO POST/****/

//--AQUI LOS CAMBIOS EN LA BASE //

$_POST['IdVoceros']=123;
$_POST['VocNombres']="JeiSSon";
$_POST['VocApellidos']="LopSSez"; // <--AQUI EL CAMBIO EN BASE //
$_POST['VocCorreo']="jeissonalexer23@hotmail.com";
$_POST['curso_IdCurso']=2;

/*******************************************************************/
/*SIMULAMOS DATOS QUE VIENEN DE UN FORMULARIO CON METODO POST/****/

$registro['IdVoceros']=$_POST['IdVoceros'];
$registro['VocNombres']=$_POST['VocNombres'];
$registro['VocApellidos']=$_POST['VocApellidos'];
$registro['VocCorreo']=$_POST['VocCorreo']; 
$registro['curso_IdCurso']=$_POST['curso_IdCurso'];         

/*******************************************************************/

$actualizar =new voceroDAO(SERVIDOR,BASE,USUARIO_BD,CONTRASENIA_BD);

$actualizaVocero=$actualizar->actualizar($registro);

echo"<pre";
print_r($actualizaVocero);    
echo"</pre";    
    
//Ya no necesita mas !!

