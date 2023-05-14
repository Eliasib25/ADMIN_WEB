<?php

class Estudiante {

    public $numeroIdentificacion;
    public $tipoIdentificacion;
    public $nombres;
    public $apellidos;
    public $placaVehiculo;

    public function __construct($numeroIdentificacion ='',$tipoIdentificacion='',
    $nombres = '',$apellidos = '',$placaVehiculo = ''){

    $this->numeroIdentificacion = $numeroIdentificacion;
    $this->tipoIdentificacion = $tipoIdentificacion;
    $this->nombres = $nombres;
    $this->apellidos = $apellidos;
    $this->placaVehiculo = $placaVehiculo;

    }

}

?>