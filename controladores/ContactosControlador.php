<?php

include_once PATH . 'modelos/modeloContacto/contactoDAO.php';
include_once PATH . 'modelos/modeloRolContacto/RolContactoDao.php';

class ContactosControlador {

    private $datos;

    public function __construct($datos) {

        $this->datos = $datos;
        $this->ContactosControlador();
    }

    public function ContactosControlador() {

        switch ($this->datos['ruta']) {
            case 'mostrarInsertarContactos':
//
//              /******SEGUNDA TABLA DE RELACIÓN UNO A MUCHOS CON VOCEROS******************** */
                $gestarrolContactos = new RolContactoDao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroRolContactos = $gestarrolContactos->seleccionarTodos();
//                /******************************************************* */
                session_start();
                $_SESSION['registroRolContactos'] = $registroRolContactos;
                $registroRolContactos = null;
//
                header("Location: principal.php?contenido=vistas/vistasContactos/vistaInsertarContacto.php");
//
                break;
//
//            //Aqui inicia inserttar contacto
//
            case 'insertarContacto':
//                //Se instancia ContactoDAO para insertar
                $buscarContacto = new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);

//                //Se consulta si existe ya el registro
                $contactoHallado = $buscarContacto->seleccionarId(array($this->datos['IdContacto']));
//                echo "<pre>";
//                print_r($contactoHallado);
//                echo "</pre>";
//                
//                //Si no existe el contacto en la base se procede a insertar ****            
                if (!$contactoHallado['exitoSeleccionId']) {
                    $insertarContacto = new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    $insertoContacto = $insertarContacto->insertar($this->datos);                //inserción de los campos en la tabla voceros 
                    $exitoInsercionContacto = $insertoContacto['inserto']; //indica si se logró inserción de los campos en la tabla vocero
                    $resultadoInsercionContacto = $insertoContacto['resultado'];                //Traer el id con que quedó el vocero de lo contrario la excepción o fallo  
//
                    session_start();
                    $_SESSION['mensajeci'] = "Registrado nuevo contacto con número de documento " . $this->datos['IdContacto'] . " con éxito.";

                    header("location:Controlador.php?ruta=listarContactos");
                } else { // Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdContacto'] = $this->datos['IdContacto'];
                    $_SESSION['ConNombres'] = $this->datos['ConNombres'];
                    $_SESSION['ConApellidos'] = $this->datos['ConApellidos'];
                    $_SESSION['ConCorreo'] = $this->datos['ConCorreo'];
                    $_SESSION['rolcontacto_Idrolcontacto'] = $this->datos['rolcontacto_Idrolcontacto'];
//
                    $_SESSION['mensajecr'] = " El contacto con numero de documento"  . $this->datos['IdContacto']. " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarContactos");
                }
                break;
//
            case 'listarContactos': // listar

                $gestarContactos = new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroContactos = $gestarContactos->seleccionarTodos();
//
//                echo "<pre>";
//                print_r($registroContactos);
//                echo"</pre>";
                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeContactos'] = $registroContactos;
                header("location:principal.php?contenido=vistas/vistasContactos/listarDTRegistrosContactos.php");
                break;

//            //actualizar contacto
            case "actualizarContacto":
                $gestarContactos = new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD); //instanciar un DAO
                $consultaDeContacto = $gestarContactos->seleccionarIdParaAct($this->datos['idAct']); //Se consulta el contacto para traer los datos.
//                 echo "<pre>";
//                 print_r($consultaDeContacto);
//                 echo "</pre>";    
//                
                $actualizarDatosContacto = $consultaDeContacto['registroEncontrado'][0];
//
//                /***PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON Contactos******************** */
                $gestarRolContactos = new RolContactoDao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroRolContactos = $gestarRolContactos->seleccionarTodos();
//             
//
                session_start();
                $_SESSION['actualizarDatosContacto'] = $actualizarDatosContacto;
                $_SESSION['registroRolContactos'] = $registroRolContactos;

                header("location:principal.php?contenido=vistas/vistasContactos/vistaActualizarContacto.php");
                break;
//
            case "confirmarActualizarContacto":

                $gestarContactos = new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarContacto = $gestarContactos->actualizar(array($this->datos)); //Se envía datos del contacto para actualizar.                
//                echo "<pre>";
//                print_r($actualizarContacto);
//                echo "</pre>";
                session_start();
                $_SESSION['mensajeactualizar'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarContactos");
                break;
//
            case "eliminarContacto";

//                echo"<pre>";
//                print_r($this->datos);
//                echo"</pre>";
//                exit();
                $gestarContactos = new contactoDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarContactos->eliminar(array($this->datos['idAct']));
//
                session_start();
                $_SESSION['mensajeeli'] = "El registro ha sido eliminado con exito ";

                header("location:Controlador.php?ruta=listarContactos");
//
                break;
        }
    }

}
