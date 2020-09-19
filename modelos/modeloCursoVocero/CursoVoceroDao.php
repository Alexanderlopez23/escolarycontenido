<?php

class CursoVoceroDao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT c.IdCurso,c.CurNum ";
        $planConsulta .= " FROM curso c ORDER BY c.IdCurso";

        $registrosCursoVocero = $this->conexion->prepare($planConsulta);
        $registrosCursoVocero->execute(); //Ejecución de la consulta 

        $listadoRegistrosCursosVoceros = array();

        while ($registro = $registrosCursoVocero->fetch(PDO::FETCH_OBJ)) {

            $listadoRegistrosCursosVoceros[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosCursosVoceros;
    }

}
