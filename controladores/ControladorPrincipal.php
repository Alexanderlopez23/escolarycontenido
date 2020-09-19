<?php

//echo"<pre>";
//print_r($_POST);
//echo"</pre>";
//AQUI EMPIEZA EL TERCER CRUD
include_once PATH . 'controladores/ProfesoresControlador.php';
include_once PATH . 'modelos/modeloProfesor/ValidadorProfesores.php';

include_once PATH . 'controladores/VocerosControlador.php';
include_once PATH . 'modelos/modeloVoceros/ValidadorVoceros.php';
include_once PATH . 'modelos/modeloUsuario_s/ValidadorUsuario_s.php';
include_once PATH . 'controladores/Usuario_sControlador.php';
//AQUI EMPIEZA EL SEGUNDO CRUD
include_once PATH . 'controladores/ContactosControlador.php';
include_once PATH . 'modelos/modeloContacto/ValidadorContactos.php';

class ControladorPrincipal {

    private $datos = array();

    public function __construct() {

//AQUI LLEGO DE PRINCIPAL.PHP :Controlador.php?ruta=mostrarInsertarVoceros        
//        echo"<pre>";
//        print_r($_GET);
//        echo"</pre>";


        if (!empty($_POST) && isset($_POST["ruta"])) {
            $this->datos = $_POST;
        }
        if (!empty($_GET) && isset($_GET["ruta"])) {
            $this->datos = $_GET;
        }


//        echo"<pre>";
//        print_r($this->datos);
//        echo"</pre>";
//        exit();

        $this->control();
    }

//logica//
//Vista insertar vocero nos envia unos datos//
//el controlador instancia una clase //
//recibe datos el validadorvoceros//
//puede devolver errores de validacion
//si se presentan errores de validacion se devuelven a la vista correspondiente 

    public function control() {

//        echo"<pre>";
//        print_r($_GET);
//        echo"</pre>";
//        exit();


        switch ($this->datos['ruta']) {
            case "mostrarInsertarVoceros":
            case "insertarVocero":
                if ($this->datos['ruta'] == "insertarVocero") {
                    $validarRegistro = new ValidadorVoceros();
                    $erroresValidacion = $validarRegistro->validarFormularioVocero($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistasVoceros/vistaInsertarVocero.php");
                } else {
                    $VocerosControlador = new VocerosControlador($this->datos);
                }
                break;

            case "mostrarinicio":
                header("location:principal.php?contenido=vistas/vistasVoceros/home.php");

                break;
//esto se hace para listar voceros
            case "listarVoceros":
                $VocerosControlador = new VocerosControlador($this->datos);
                break;

//esto se hace para actualizar vocero
            case "actualizarVocero":

                $VocerosControlador = new VocerosControlador($this->datos);
//                
                break;
            case "confirmarActualizarVocero":
                if ($this->datos['ruta'] == "confirmaActualizarVocero") {
                    $validarRegistro = new ValidadorVocero();
                    $erroresValidacion = $validarRegistro->validarFormularioVocero($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistasVoceros/vistaActualizarVocero.php");
                } else {
                    $VocerosControlador = new VocerosControlador($this->datos);
                }

                break;

//Aqui es para eliminar el registro del vocero (eliminado fisico)//            
            case "eliminarVocero":

                $VocerosControlador = new VocerosControlador($this->datos);
                break;

///*****GESTIONANDO LA TABLA usuario_s y persona********///                
            case "gestionDeRegistro":
                if ($this->datos['ruta'] == "gestionDeRegistro") {
                    $validarRegistro = new ValidadorUsuarios_s();
                    $erroresValidacion = $validarRegistro->validarFormularioUsuarios_s($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
//                    $erroresValidacion = json_encode($erroresValidacion);
                    if ($this->datos['ruta'] == "gestionDeRegistro") {

                        header("location:registro.php");
                    }
                } else {
                    $usuario_sControlador = new Usuario_sControlador($this->datos);
                }
                break;
            case "gestionDeAcceso":
            case "cerrarSesion":
                $usuario_sControlador = new Usuario_sControlador($this->datos);
                break;

//GESTION CRUD NUMERO DOS 
//Se muestra la vista insertar contacto una vez pasa eso se procedera a insertar in contacto
//se evalua que el contacto este bien y no tenga errores de validacion
// si tiene errores de la sesion se descargan los errores y se muestran
// por sesion se pintan errores y se devuelve a la vista insertar 
// si no llega a ver errores de validacion dejamos que pase a su logica             

            case "mostrarInsertarContactos":
            case "insertarContacto":
                if ($this->datos['ruta'] == "insertarContacto") {
                    $validarRegistro = new ValidadorContactos();
                    $erroresValidacion = $validarRegistro->validarFormularioContacto($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistascontactos/vistaInsertarContacto.php");
                } else {
                    $ContactosControlador = new ContactosControlador($this->datos);
                }
                break;


            //esto se hace para listar contactos
            case "listarContactos":
                $ContactosControlador = new ContactosControlador($this->datos);
                break;


            case "actualizarContacto":
//
                $ContactosControlador = new ContactosControlador($this->datos);
////                
                break;

            case "confirmarActualizarContacto":
                if ($this->datos['ruta'] == "confirmarActualizarContacto") {
                    $validarRegistro = new ValidadorContactos();
                    $erroresValidacion = $validarRegistro->validarFormularioContacto($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistascontactos/vistaActualizarContacto.php");
                } else {
                    $ContactosControlador = new ContactosControlador($this->datos);
                }

                break;
            //esto se hace para elimino fisico de contactos    
            case "eliminarContacto":

                $ContactosControlador = new ContactosControlador($this->datos);
                break;


//GESTION CRUD NUMERO TRES 
//Se muestra la vista insertar profesor una vez pasa eso se procedera a insertar un 
//profesor se evalua que el profesor este bien y cumpla con los patrones de validacion
// y no tenga errores de validacion para dejarlo pasar
// si tiene errores en la sesion se descargan los errores y se muestran
// por sesion se pintan errores y se devuelve a la vista insertar 
// si no llega a ver errores de validacion dejamos que pase a su logica             
            case "mostrarInsertarProfesores":
            case "insertarProfesor":
                if ($this->datos['ruta'] == "insertarProfesor") {
                    $validarRegistro = new ValidadorProfesores();
                    $erroresValidacion = $validarRegistro->validarFormularioProfesor($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistasprofesores/vistaInsertarProfesor.php");
                } else {
                    $ProfesoresControlador = new ProfesoresControlador($this->datos);
                }
                break;
//
//
//            //esto se hace para listar profesores
            case "listarProfesores":
                $ProfesoresControlador = new ProfesoresControlador($this->datos);
                break;

            case "actualizarProfesor":

                $ProfesoresControlador = new ProfesoresControlador($this->datos);

                break;
//
            case "confirmarActualizarProfesor":
                if ($this->datos['ruta'] == "confirmarActualizarProfesor") {
                    $validarRegistro = new ValidadorProfesores();
                    $erroresValidacion = $validarRegistro->validarFormularioProfesor($this->datos);
                }
                if (isset($erroresValidacion) && $erroresValidacion != FALSE) {
                    session_start();
                    $_SESSION['erroresValidacion'] = $erroresValidacion;
                    header("location:principal.php?contenido=vistas/vistasprofesores/vistaActualizarProfesor.php");
                } else {
                    $ProfesoresControlador = new ProfesoresControlador($this->datos);
                }
                break;
//            //esto se hace para elimino fisico de profesro   
            case "eliminarProfesor":
//
                $ProfesoresControlador = new ProfesoresControlador($this->datos);
                break;                
//En caso de hacer un eliminado logico se implementa aqui hacia abajo              
        }
    }

}
