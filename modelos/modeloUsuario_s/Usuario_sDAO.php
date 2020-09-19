<?php

include_once PATH.'modelos/ConBdMysql.php';

class Usuario_sDAO extends ConBdMySql {

    private $cantidadTotalRegistros;

    function __construct($servidor, $base, $loginBD, $passwordBD) {
        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarId($sId) {//llega como parametro un array con datos a consultar
//
//        $resultadoConsulta = FALSE;
//        echo"<pre>";print_r($sId);echo "</pre>";
        if (!isset($sId[2])) { //si la consulta no viene con el password (PARA REGISTRARSE)
            $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
            $planConsulta .= " where p.perDocumento= ? or u.usuLogin = ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($sId[0], $sId[1]));
        }
        if (isset($sId[2])) {//si la consulta viene con el password (PARA LOGUEARSE)
            $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
            $planConsulta .= " where u.usuLogin= ? and u.usuPassword = ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($sId[1], $sId[2]));
        }
        if (!isset($sId[1]) && !isset($sId[2])) {//si la consulta viene con solo el documento (PARA ENCONTRAR PERSONA)
            $planConsulta = "select * from persona p join usuario_s u on p.perId=u.usuId ";
            $planConsulta .= " where p.perDocumento = ? ;";
            $listar = $this->conexion->prepare($planConsulta);
            $listar->execute(array($sId[0]));
        }

        $registroEncontrado = array();
        while ($registro = $listar->fetch(PDO::FETCH_OBJ)) {
            $registroEncontrado[] = $registro;
        }

        if (isset($registroEncontrado[0]->usuId) && $registroEncontrado[0]->usuId != FALSE) {
            return ['exitoSeleccionId' => 1, 'registroEncontrado' => $registroEncontrado];
        } else {
            return ['exitoSeleccionId' => 0, 'registroEncontrado' => $registroEncontrado];
        }
    }

    public function insertar($registro) {

        try {

            $inserta = $this->conexion->prepare('INSERT INTO usuario_s (usuLogin, usuPassword) VALUES ( :usuLogin, :usuPassword )');
            $inserta->bindParam(":usuLogin", $registro['email']);
            $inserta->bindParam(":usuPassword", $registro['password']);
            $insercion = $inserta->execute();
            $clavePrimariaConQueInserto = $this->conexion->lastInsertId();

            return ['inserto' => 1, 'resultado' => $clavePrimariaConQueInserto];
        } catch (Exception $exc) {
            return ['inserto' => 0, 'resultado' => $exc->getTraceAsString()];
        }
    }

    public function seleccionarTodos() {

        $planConsulta = "select * from usuario_s order by usuId DESC;"; //Se prepara la consulta

        $registrosUsuario_s = $this->conexion->prepare($planConsulta); //Se envia la consulta
        $registrosUsuario_s->execute(); //Ejecución de la consulta
        $listadoRegistrosUsuario_s = array();
        @$listadoRegistrosUsuario_s[0]->usuId = "";
        @$listadoRegistrosUsuario_s[0]->usuLogin = "Seleccione";

        while ($registro = $registrosUsuario_s->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosUsuario_s[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosUsuario_s;
    }

}


