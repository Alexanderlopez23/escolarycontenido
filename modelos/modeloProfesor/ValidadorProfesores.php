<?php

class ValidadorProfesores {

//Creamos la funcion primero
    public function validarFormularioProfesor($datos) {
        $mensajesError = NULL;
        $datosViejos = NULL;
        $marcaCampo = NULL;

//  echo "<pre>";
//  print_r($datos);
//  echo "</pre>";

        /*         * ***Validar datos ingresados************************ */

        foreach ($datos as $key => $value) {
            $datosViejos[$key] = $value;

            switch ($key) {
                case 'IdProfesor':
                    $patronDocumento = "/^[[:digit:]]+$/"; //AQUI SOLO ES PARA NUMEROS
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['IdProfesor'] = "Dato incorrecto vuelve a intentarlo";
                    }
                    break;  // AQUI SOLO PARA CORREOS:^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$
                case 'ProNombres':
                    $patronDocumento = "//";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['ProNombres'] = "Por favor inserte un nombre valido";
                    }
                    break;

                case 'ProApellidos':
                    $patronDocumento = "//";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['ProApellidos'] = "Por favor inserte un apellido valido";
                    }
                    break;

                case 'ProCorreo':
                    $patronDocumento = "/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/";
                    if (!preg_match($patronDocumento, $value)) {
                        $mensajesError['ProCorreo'] = "Por favor inserte un correo valido";
                    }
                    break;
            }
        }
        /*         * ********************************************************************* */
        //ESTO SE HACE PARA EN CASO QUE LA LOGICA DE ARRIBA  SE CUMPLA// 
        if (!is_null($mensajesError)) {
            return array('datosViejos' => $datosViejos, 'mensajesError' => $mensajesError, 'marcaCampo' => $marcaCampo);
        } else {
            $datosViejos = NULL;
            return FALSE;
        }
    }

}
