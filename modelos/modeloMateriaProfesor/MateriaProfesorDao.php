<?php

class MateriaProfesorDao extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    public function seleccionarTodos() {

        $planConsulta = "SELECT m.IdMateria,m.NomMat ";
        $planConsulta .= " FROM materias m ORDER BY m.IdMateria";

        $registrosMateriaProfesor = $this->conexion->prepare($planConsulta); 
        $registrosMateriaProfesor->execute(); //Ejecución de la consulta  

        $listadoRegistrosMateriaProfesor = array(); 

        while ($registro = $registrosMateriaProfesor->fetch(PDO::FETCH_OBJ)) { 

            $listadoRegistrosMateriaProfesor[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosMateriaProfesor; 
    }

}

