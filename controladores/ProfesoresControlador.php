<?php

include_once PATH . 'modelos/modeloProfesor/profesorDAO.php';
include_once PATH . 'modelos/modeloMateriaProfesor/MateriaProfesorDao.php';

class ProfesoresControlador {

    private $datos;

    public function __construct($datos) {

        $this->datos = $datos;
        $this->ProfesoresControlador();
    }

    public function ProfesoresControlador() {

        switch ($this->datos['ruta']) {
            case 'mostrarInsertarProfesores':
//
//              /******TERCERA TABLA DE RELACIÓN UNO A MUCHOS CON PROFESORES******************** */
                $gestarmateriaProfesores = new MateriaProfesorDao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroMateriaProfesores = $gestarmateriaProfesores->seleccionarTodos();
//                /******************************************************* */
//                echo "<pre>";
//                print_r($registroMateriaProfesores);
//                echo "</pre>"; exit();


                session_start();
                $_SESSION['registroMateriaProfesores'] = $registroMateriaProfesores;
                $registroMateriaProfesores = null;
//
                header("Location: principal.php?contenido=vistas/vistasprofesores/vistaInsertarProfesor.php");
//
                break;
//insertarProfesor
            case 'insertarProfesor':
                //Se instancia ProfesorDAO para insertar
                $buscarProfesor = new profesorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                //Se consulta si existe ya el registro
                $profesorHallado = $buscarProfesor->seleccionarId(array($this->datos['IdProfesor']));
//                echo "<pre>";
//                print_r($profesorHallado);
//                echo "</pre>";
//               
                //Si no existe el profesor en la base se procede a insertar ****            
                if (!$profesorHallado['exitoSeleccionId']) {
                    $insertarProfesor = new profesorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                    $insertoProfesor = $insertarProfesor->insertar($this->datos); //inserción de los campos en la tabla profesor 
                    $exitoInsercionProfesor = $insertoProfesor['inserto']; //indica si se logró inserción de los campos en la tabla profesor
                    $resultadoInsercionProfesor = $insertoProfesor['resultado'];                //Traer el id con que quedó el vocero de lo contrario la excepción o fallo  

                    session_start();
                    $_SESSION['mensaje'] = "Registrado nuevo Profesor con número de documento " . $this->datos['IdProfesor'] . " con éxito.";

                    header("location:Controlador.php?ruta=listarProfesores");
                } else { // Si existe se retornan los datos y se envía el mensaje correspondiente ****
                    session_start();
                    $_SESSION['IdProfesor'] = $this->datos['IdProfesor'];
                    $_SESSION['ProNombres'] = $this->datos['ProNombres'];
                    $_SESSION['ProApellidos'] = $this->datos['ProApellidos'];
                    $_SESSION['ProCorreo'] = $this->datos['ProCorreo'];
                    $_SESSION['materias_IdMateria'] = $this->datos['materias_IdMateria'];

                    $_SESSION['mensaje'] = " El profesor con numero de documento" . $this->datos['IdProfesor'] . " ya existe en el sistema.";

                    header("location:Controlador.php?ruta=mostrarInsertarProfesores");
                }
                break;

            case 'listarProfesores': // listar
//
                $gestarProfesores = new profesorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroProfesores = $gestarProfesores->seleccionarTodos();
////
//                echo "<pre>";
//                print_r($registroProfesores);
//                echo"</pre>"; exit();
                session_start();
//                //SE SUBEN A SESION LOS DATOS NECESARIOS PARA QUE LA VISTA LOS IMPRIMA O UTILICE//
                $_SESSION['listaDeProfesores'] = $registroProfesores;
                header("location:principal.php?contenido=vistas/vistasprofesores/listarDTRegistrosProfesores.php");
                break;

            //actualizar profesor
            case "actualizarProfesor":
                $gestarProfesores = new profesorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD); //instanciar un DAO
                $consultaDeProfesor = $gestarProfesores->seleccionarIdParaAct($this->datos['idAct']); //Se consulta el profesor para traer los datos.
//                 echo "<pre>";
//                 print_r($consultaDeProfesor);
//                 echo "</pre>";    exit();
////                
                $actualizarDatosProfesor = $consultaDeProfesor['registroEncontrado'][0];
////
////                /***PRIMERA TABLA DE RELACIÓN UNO A MUCHOS CON Contactos******************** */
                $gestarMateriaProfesores = new MateriaProfesorDao(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $registroMateriaProfesores = $gestarMateriaProfesores->seleccionarTodos();
////             

                session_start();
                $_SESSION['actualizarDatosProfesor'] = $actualizarDatosProfesor;
                $_SESSION['registroMateriaProfesores'] = $registroMateriaProfesores;

                header("location:principal.php?contenido=vistas/vistasprofesores/vistaActualizarProfesor.php");
                break;

            case "confirmarActualizarProfesor":
//
                $gestarProfesores = new profesorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $actualizarProfesor = $gestarProfesores->actualizar(array($this->datos)); //Se envía datos del profesor para actualizar.                
//                echo "<pre>";
//                print_r($this->datos);
//                echo "</pre>"; exit();
                session_start();
                $_SESSION['mensaje'] = "Actualización realizada.";
                header("location:Controlador.php?ruta=listarProfesores");
                break;

            case "eliminarProfesor";
//
//                echo"<pre>";
//                print_r($this->datos);
//                echo"</pre>";
//                exit();
                $gestarProfesores = new profesorDAO(SERVIDOR, BASE, USUARIO_BD, CONTRASENIA_BD);
                $gestarProfesores->eliminar(array($this->datos['idAct']));

               session_start();
                $_SESSION['mensaje'] = "El registro ha sido eliminado con exito ";

                header("location:Controlador.php?ruta=listarProfesores");

                break;
        }
    }

}
