<?php

include_once PATH.'modelos/ConBdMysql.php';

class PersonaDAO extends ConBdMySql {

    private $cantidadTotalRegistros;

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($sId) {
//
//        $resultadoConsulta = FALSE;

        $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
        $planConsulta .= " where p.perDocumento= ? or u.usuLogin = ? ;";
        $listar = $this->conexion->prepare($planConsulta);
        $listar->execute(array($sId[0], $sId[1]));

        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }

        if ($registro != FALSE) {
            return ['exitoSeleccionId' => TRUE, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => FALSE, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertar($registro) {

        try {

            $inserta = $this->conexion->prepare('INSERT INTO persona (perId, perDocumento, perNombre, perApellido, usuario_s_usuId) VALUES ( :perId, :perDocumento, :perNombre, :perApellido, :usuario_s_usuId );');
            $inserta->bindParam(":perId", $registro['perId']);
            $inserta->bindParam(":perDocumento", $registro['documento']);
            $inserta->bindParam(":perNombre", $registro['nombre']);
            $inserta->bindParam(":perApellido", $registro['apellidos']);
            $inserta->bindParam(":usuario_s_usuId", $registro['perId']);
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } /* catch (Exception $exc) {
          return ['inserto' => FALSE, 'resultado' => $exc->getTraceAsString()];
          } */ catch (PDOException $pdoExc) {
            return ['inserto' => 0, 'resultado' => $pdoExc];
        }
    }

    public function seleccionarTodos() {

        $planConsulta = "select * from persona order by perApellido ASC;"; //Se prepara la consulta

        $registrosPersona = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosPersona->execute(); //Ejecución de la consulta
        $listadoRegistrosPersona = array();
        @$listadoRegistrosPersona[0]->usuId = "";
        @$listadoRegistrosPersona[0]->usuLogin = "Seleccione";

        while ($registro = $registrosPersona->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosPersona[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosPersona;
    }

}




