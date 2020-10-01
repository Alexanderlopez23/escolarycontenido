<?php

include_once PATH . 'modelos/modeloVoceros/voceroDAO.php';
include_once PATH . 'modelos/modeloCursoVocero/CursoVoceroDao.php';

class VocerosControlador {

    private $datos;

    public function __construct($datos) {

        $this->datos = $datos;
        $this->VocerosControlador();
    }

    public function VocerosControlador() {

        switch ($this->datos['ruta']) {
            case 'mostrarInsertarVoceros':

                /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON VOCEROS******************** */
                $gestarCursoVoceros = new CursoVoceroDao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroCursoVoceros = $gestarCursoVoceros->seleccionarTodos();
                /*                 * ************************************************************************* */
                session_start();
                $_SESSION['registroCursoVoceros'] = $registroCursoVoceros;
                $registroCursoVoceros = null;

                header("Location: principal.php?contenido=vistas/vistasVoceros/vistaInsertarVocero.php");

                break;


            //Aqui inicia inserttar VOCERO


            case 'insertarVocero':
                //Se instancia VoceroDAO para insertar
                $buscarVocero = new voceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
//                echo "<pre>";
//                print_r($libroHallado);
//                echo "</pre>";                
                //Se consulta si existe ya el registro
                $voceroHallado = $buscarVocero->seleccionarId(array($this->datos['IdVoceros']));
                //Si no existe el voero en la base se procede a insertar ****            
                if (!$voceroHallado['exitoSeleccionId']) {
                    $insertarVocero = new voceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    $insertoVocero = $insertarVocero->insertar($this->datos);                //inserción de los campos en la tabla voceros 
                    $exitoInsercionVocero = $insertoVocero['inserto']; //indica si se logró inserción de los campos en la tabla vocero
                    $resultadoInsercionVocero = $insertoVocero['resultado'];                //Traer el id con que quedó el vocero de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensajenvi'] = "Registrado nuevo vocero con numero de documento " . $this->datos['IdVoceros'] . " con éxito.";

                    header("location:Controlador.php?ruta=listarVoceros");
                } else {// Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdVoceros'] = $this->datos['IdVoceros'];
                    $_SESSION['VocNombres'] = $this->datos['VocNombres'];
                    $_SESSION['VocApellidos'] = $this->datos['VocApellidos'];
                    $_SESSION['VocCorreo'] = $this->datos['VocCorreo'];
                    $_SESSION['curso_IdCurso'] = $this->datos['curso_IdCurso'];

                    $_SESSION['mensajenvr'] = " El vocero con numero de documento " . $this->datos['IdVoceros'] . " ya existe en el sistema, vuelve a intentarlo nuevamente";

                    header("location:Controlador.php?ruta=mostrarInsertarVoceros");
                }
                break;

            case 'listarVoceros': // listar

                $gestarVoceros = new VoceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroVoceros = $gestarVoceros->seleccionarTodos();

//                echo "<pre>";
//                print_r($registroVoceros);
//                echo"</pre>";
                session_start();
                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeVoceros'] = $registroVoceros;
                header("location:principal.php?contenido=vistas/vistasVoceros/listarDTRegistrosVoceros.php");
                break;

            //actualizar vocero
            case "actualizarVocero":
                $gestarVoceros = new VoceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $consultaDeVocero = $gestarVoceros->seleccionarIdParaAct($this->datos['idAct']); //Se consulta el libro para traer los datos.

                $actualizarDatosVocero = $consultaDeVocero['registroEncontrado'][0];

                /*                 * ****PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON LIBROS******************** */
                $gestarCursoVoceros = new CursoVoceroDao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroCursosVoceros = $gestarCursoVoceros->seleccionarTodos();
                /*                 * ************************************************************************* */

                session_start();
                $_SESSION['actualizarDatosVocero'] = $actualizarDatosVocero;
                $_SESSION['registroCursosVoceros'] = $registroCursosVoceros;

                header("location:principal.php?contenido=vistas/vistasVoceros/vistaActualizarVocero.php");
                break;

            case "confirmarActualizarVocero":
//                echo"<pre>";
//                print_r($this->datos);
//                echo"<pre>";
                $gestarVoceros = new VoceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarVocero = $gestarVoceros->actualizar(array($this->datos)); //Se envía datos del libro para actualizar.                
//
                session_start();
                $_SESSION['mensajeactualizar'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarVoceros");
                break;

            case "eliminarVocero";

//                echo"<pre>";
//                print_r($this->datos);
//                echo"</pre>";
//                exit();
                $gestarVoceros = new VoceroDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarVoceros->eliminar(array($this->datos['idAct']));

                session_start();
                $_SESSION['mensajeeli'] = "El registro ha sido eliminado con exito ";

                header("location:Controlador.php?ruta=listarVoceros");

                break;
        }
    }

}
