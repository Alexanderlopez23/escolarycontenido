<?php

include_once PATH . 'modelos/ConBdMysql.php';

class contactoDAO extends ConBdMySql {

    public function __construct($servidor, $base, $loginBD, $passwordBD) {

        parent::__construct($servidor, $base, $loginBD, $passwordBD);
    }

    //Comienza 1 metodo selecionarTodos ()     

    public function seleccionarTodos() {

        $planConsulta = "SELECT c.IdContacto,c.ConNombres,c.ConApellidos,c.ConCorreo,r.Idrolcontacto,r.Nomrol";
        $planConsulta .= " FROM contacto c";
        $planConsulta .= " JOIN  rolcontacto r ON c.rolcontacto_Idrolcontacto=r.Idrolcontacto ";
        $planConsulta .= " ORDER BY c.IdContacto ASC ";

        $registrosContactos = $this->conexion->prepare($planConsulta);
        $registrosContactos->execute(); //Ejecución de la consulta 

        $listadoRegistrosContacto = array();

        while ($registro = $registrosContactos->fetch(PDO::FETCH_OBJ)) {
            $listadoRegistrosContacto[] = $registro;
        }

        $this->cierreBd();

        return $listadoRegistrosContacto;
    }

//Termina 1 metodo 
//Comienza 2metodo seleccionarId()    

    public function seleccionarId($sId) {

        $planConsulta = "SELECT * from contacto c ";
        $planConsulta .= " where c.IdContacto= ? ;";

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
            $query = "INSERT INTO contacto ";
            $query .= " (IdContacto, ConNombres, ConApellidos, ConCorreo, rolcontacto_Idrolcontacto) ";
            $query .= " VALUES";
            $query .= "(:IdContacto , :ConNombres , :ConApellidos , :ConCorreo , :rolcontacto_Idrolcontacto ); ";

            $inserta = $this->conexion->prepare($query);

            $inserta->bindParam(":IdContacto", $registro['IdContacto']);
            $inserta->bindParam(":ConNombres", $registro['ConNombres']);
            $inserta->bindParam(":ConApellidos", $registro['ConApellidos']);
            $inserta->bindParam(":ConCorreo", $registro['ConCorreo']);
            $inserta->bindParam(":rolcontacto_Idrolcontacto", $registro['rolcontacto_Idrolcontacto']);

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
            $ConApellidos = $registro[0]['ConApellidos'];
            $ConNombres = $registro[0]['ConNombres'];
            $ConCorreo = $registro[0]['ConCorreo'];
            $rolcontacto_Idrolcontacto = $registro[0]['rolcontacto_Idrolcontacto'];
            $IdContacto = $registro[0]['IdContacto'];


            if (isset($IdContacto)) {
                $actualizar = "UPDATE contacto SET ConApellidos= ? , ConNombres = ? , ConCorreo = ? , rolcontacto_Idrolcontacto = ? WHERE IdContacto= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($ConApellidos, $ConNombres, $ConCorreo, $rolcontacto_Idrolcontacto, $IdContacto));
                return ['actualizacion' => $actualizacion, 'mensaje' => "Actualizacion realizada."];
            }
        } catch (PDOException $pdoExc) {
            return ['actualizacion' => $actualizacion, 'mensaje' => $pdoExc];
        }
    }

//Termina el metodo 4 actualizar()
//Comienza 5 metodo eliminar()
    public function eliminar($sId = array()) { //Recibe llave primaria a eliminar
        $planconsulta = "delete from contacto ";
        $planconsulta .= " where IdContacto= :IdContacto ;";
        $eliminar = $this->conexion->prepare($planconsulta);
        $eliminar->bindparam(':IdContacto', $sId[0], PDO::PARAM_INT);
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
                $actualizar = "UPDATE contacto SET estado = ? WHERE IdContacto= ? ;";
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
                $actualizar = "UPDATE contacto SET estado = ? WHERE IdContacto= ? ;";
                $actualizacion = $this->conexion->prepare($actualizar);
                $actualizacion = $actualizacion->execute(array($cambiarEstado, $sId[0]));
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

        $planConsulta = "SELECT * from contacto c ";
        $planConsulta .= " where c.IdContacto= ? ;";

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
