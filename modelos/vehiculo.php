<?php

class Vehiculo {

    public $idVehiculos;
    public $Nombre;
    public $Modelo;
    public $PlacaVehiculo;
    public $Color;
    public $NumeroIdentificacion;
    public $TipoIdentificacion;

    public function __construct($idVehiculos = '',$Nombre = '',$Modelo = '',$PlacaVehiculo ='',$Color='',$NumeroIdentificacion = '',$TipoIdentificacion = ''){

    $this->idVehiculos = $idVehiculos;
    $this->Nombre = $Nombre;    
    $this->Modelo = $Modelo;
    $this->PlacaVehiculo = $PlacaVehiculo;
    $this->Color = $Color;
    $this->NumeroIdentificacion = $NumeroIdentificacion;
    $this->TipoIdentificacion = $TipoIdentificacion;

    }

}

?>