<?php

class RolContactoDao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT r.Idrolcontacto,r.Nomrol ";
        $planConsulta .= " FROM rolcontacto r ORDER BY r.Idrolcontacto";

        $registrosRolContacto = $this->conexion->prepare($planConsulta);
        $registrosRolContacto->execute(); //Ejecución de la consulta 

        $listadoRegistrosRolContacto = array();

        while ($registro = $registrosRolContacto->fetch(PDO::FETCH_OBJ)) {

            $listadoRegistrosRolContacto[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosRolContacto;
    }

}

