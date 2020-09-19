<?php

include_once PATH . 'modelos/ConBdMysql.php';

class profesorDAO extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }


    //Comienza 1 metodo selecionarTodos ()     

    public function seleccionarTodos() {

        $planConsulta = "SELECT p.IdProfesor,p.ProNombres,p.ProApellidos,p.ProCorreo,m.IdMateria,m.NomMat";
        $planConsulta .= " FROM profesor p";
        $planConsulta .= " JOIN  materias m ON p.materias_IdMateria=m.IdMateria ";
        $planConsulta .= " ORDER BY p.IdProfesor ASC ";

        $registrosProfesores = $this->conexion->prepare($planConsulta);
        $registrosProfesores->execute(); //Ejecución de la consulta 

        $listadoRegistrosProfesor = array();

        while ($registro = $registrosProfesores->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosProfesor[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosProfesor;
    }
//
////Termina 1 metodo 
////Comienza 2metodo seleccionarId()    
//
    public function seleccionarId($sId) {
//
        $planConsulta = "SELECT * from profesor p ";
        $planConsulta .= " where p.IdProfesor= ? ;";
//
        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId[0])); //ESTO SE DEBE REVISAR 
//
        $registroEncontrado = array();
//
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        $this->cierreBd();
        if (!empty($registroEncontrado)) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        }
    }

////Termina 2  metodo     
////comienza metodo insertar()    
//
    public function insertar($registro) {
        try {
            $query = "INSERT INTO profesor ";
            $query .= " (IdProfesor, ProNombres, ProApellidos, ProCorreo, materias_IdMateria) ";
            $query .= " VALUES";
            $query .= "(:IdProfesor , :ProNombres , :ProApellidos , :ProCorreo , :materias_IdMateria ); ";

            $inserta = $this->conexion->prepare($query);

            $inserta->bindParam(":IdProfesor", $registro['IdProfesor']);
            $inserta->bindParam(":ProNombres", $registro['ProNombres']);
            $inserta->bindParam(":ProApellidos", $registro['ProApellidos']);
            $inserta->bindParam(":ProCorreo", $registro['ProCorreo']);
            $inserta->bindParam(":materias_IdMateria", $registro['materias_IdMateria']);

            $insercion = $inserta->execute();

            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc->errorInfo[2]];
        }
    }

    //Termina el metodo 3 insertar 
//Comienza 4 metodo actualizar()
    public function actualizar($registro) {
        try {
            $ProApellidos = $registro[0]['ProApellidos'];
            $ProNombres = $registro[0]['ProNombres'];
            $ProCorreo = $registro[0]['ProCorreo'];
            $materias_IdMateria = $registro[0]['materias_IdMateria'];
            $IdProfesor = $registro[0]['IdProfesor'];

            if (isset($IdProfesor)) {
                $actualizar = "UPDATE profesor SET ProApellidos= ? , ProNombres = ? , ProCorreo = ? , materias_IdMateria = ? WHERE IdProfesor= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($ProApellidos, $ProNombres, $ProCorreo, $materias_IdMateria, $IdProfesor));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualizacion realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
      
//Termina el metodo 4 actualizar()
////Comienza 5 metodo eliminar()
    public function eliminar($sId = array()) { //Recibe llave primaria a eliminar
        $planconsulta = "delete from profesor ";
        $planconsulta .= " where IdProfesor= :IdProfesor ;";
        $eliminar = $this->conexion->prepare($planconsulta);
        $eliminar->bindparam(':IdProfesor', $sId[0], PDO::PARAM_INT);
        $resultado=$eliminar->execute();
//
        $this->cierreBd();

        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($sId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($sId[0])];
        }
    }
//
//Termina el metodo 5 eliminar()
//Comienza 6 metodo eliminarlogico()
//
    public function eliminarLogico($sId = array()) {//Se deshabilita un registro cambiando su estado a 0
        try {

            $cambiarEstado = 0;

            if (isset($sId[0])) {
                $actualizar = "UPDATE profesor SET estado = ? WHERE IdProfesor= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Inactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }
////Termina el metodo 6 eliminarlogico()
////Comienza el 7 metodohabilitar()    
//    
    public function habilitar($sId = array()) { //se habilita un registro cambiando su estado a 1
        try {
            $cambiarEstado=1;
        
            if (isset($sId[0])) {
                $actualizar = "UPDATE profesor SET estado = ? WHERE IdProfesor= ? ;";    
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion  = $actualizacion->execute(array($cambiarEstado, $sId[0])); 
                return ['actualizacion' => $actualizacion, 'mensaje' => "registro activado nuevamente."];
            }
        } catch (PDOException $pdoExc) {
        return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    } 



////////////////////////////////////////////////////////////////////////////
                       //PRUEBAS///
///////////////////////////////////////////////////////////////////////////

    public function seleccionarIdParaAct($sId) {
//
        $planConsulta = "SELECT * from profesor p ";
        $planConsulta .= " where p.IdProfesor= ? ;";
//
        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId)); //ESTO SE DEBE REVISAR 
//
        $registroEncontrado = array();
//
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }
        $this->cierreBd();
        if (!empty($registroEncontrado)) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        }
    }
}





    