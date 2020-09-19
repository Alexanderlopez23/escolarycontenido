<?php

include_once PATH . 'modelos/ConBdMysql.php';

class voceroDAO extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    //Comienza 1 metodo selecionarTodos ()     

    public function seleccionarTodos() {

        $planConsulta = "SELECT v.IdVoceros,v.VocNombres,v.VocApellidos,v.VocCorreo,c.IdCurso,c.CurNum";
        $planConsulta .= " FROM voceros v";
        $planConsulta .= " JOIN  curso c ON v.curso_IdCurso=c.IdCurso ";
        $planConsulta .= " ORDER BY v.IdVoceros ASC ";

        $registrosVoceros = $this->conexion->prepare($planConsulta);
        $registrosVoceros->execute(); //Ejecución de la consulta 

        $listadoRegistrosVocero = array();

        while ($registro = $registrosVoceros->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosVocero[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosVocero;
    }

//Termina 1 metodo 
//Comienza 2metodo seleccionarId()    

    public function seleccionarId($sId) {

        $planConsulta = "SELECT * from voceros v ";
        $planConsulta .= " where v.IdVoceros= ? ;";

        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId[0]));

        $registroEncontrado = array();

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

//Termina 2  metodo     
//comienza metodo insertar()    


    public function insertar($registro) {
        try {
            $query = "INSERT INTO voceros ";
            $query .= " (IdVoceros, VocNombres, VocApellidos, VocCorreo, curso_IdCurso) ";
            $query .= " VALUES";
            $query .= "(:IdVoceros , :VocNombres , :VocApellidos , :VocCorreo , :curso_IdCurso ); ";

            $inserta = $this->conexion->prepare($query);

            $inserta->bindParam(":IdVoceros", $registro['IdVoceros']);
            $inserta->bindParam(":VocNombres", $registro['VocNombres']);
            $inserta->bindParam(":VocApellidos", $registro['VocApellidos']);
            $inserta->bindParam(":VocCorreo", $registro['VocCorreo']);
            $inserta->bindParam(":curso_IdCurso", $registro['curso_IdCurso']);

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
            $VocApellidos = $registro[0]['VocApellidos'];
            $VocNombres = $registro[0]['VocNombres'];
            $VocCorreo = $registro[0]['VocCorreo'];
            $curso = $registro[0]['curso_IdCurso'];
            $IdVoceros = $registro[0]['IdVoceros'];


            if (isset($IdVoceros)) {
                $actualizar = "UPDATE voceros SET VocApellidos= ? , VocNombres = ? , VocCorreo = ? , curso_IdCurso = ? WHERE IdVoceros= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($VocApellidos, $VocNombres, $VocCorreo, $curso, $IdVoceros));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualizacion realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

//Termina el metodo 4 actualizar()
//Comienza 5 metodo eliminar()
    public function eliminar($sId = array()) { //Recibe llave primaria a eliminar
        $planconsulta = "delete from voceros ";
        $planconsulta .= " where IdVoceros= :IdVoceros ;";
        $eliminar = $this->conexion->prepare($planconsulta);
        $eliminar->bindparam(':IdVoceros', $sId[0], PDO::PARAM_INT);
        $resultado = $eliminar->execute();

        $this->cierreBd();

        if (!empty($resultado)) {
            return ['eliminar' => TRUE, 'registroEliminado' => array($sId[0])];
        } else {
            return ['eliminar' => FALSE, 'registroEliminado' => array($sId[0])];
        }
    }

//Termina el metodo 5 eliminar()
//Comienza 6 metodo eliminarlogico()

    public function eliminarLogico($sId = array()) {//Se deshabilita un registro cambiando su estado a 0
        try {

            $cambiarEstado = 0;

            if (isset($sId[0])) {
                $actualizar = "UPDATE voceros SET estado = ? WHERE IdVoceros= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Inactivado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

//Termina el metodo 6 eliminarlogico()
//Comienza el 7 metodohabilitar()    

    public function habilitar($sId = array()) { //se habilita un registro cambiando su estado a 1
        try {
            $cambiarEstado = 1;

            if (isset($sId[0])) {
                $actualizar = "UPDATE voceros SET estado = ? WHERE IdVoceros= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Registro Activado."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
        }

////////////////////////////////////////////////////////////////////////////
        //PRUEBAS///
///////////////////////////////////////////////////////////////////////////

        public function seleccionarIdParaAct($sId) {


        $planConsulta = "SELECT * from voceros v ";
        $planConsulta .= " where v.IdVoceros= ? ;";

        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId));

        $registroEncontrado = array();

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
