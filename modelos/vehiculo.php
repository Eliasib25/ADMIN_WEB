<?php

class Vehiculo {

    public $idVehiculos;
    public $Nombre;
    public $Modelo;
    public $PlacaVehiculo;
    public $Color;

    public function __construct($idVehiculos = '',$Nombre = '',$Modelo = '',$PlacaVehiculo ='',$Color='',){

    $this->idVehiculos = $idVehiculos;
    $this->Nombre = $Nombre;    
    $this->Modelo = $Modelo;
    $this->PlacaVehiculo = $PlacaVehiculo;
    $this->Color = $Color;

    }

}

?>