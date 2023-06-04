<?php

class Parqueaderos {

    public $Id;
    public $Nombre;
    public $CapacidadTotal;
    public $Ubicacion;
    public $Disponibilidad;

    public function __construct($Id = '',$Nombre = '',$CapacidadTotal = '',$Ubicacion ='',$Disponibilidad =''){

    $this->Id = $Id;
    $this->Nombre = $Nombre;    
    $this->CapacidadTotal = $CapacidadTotal;
    $this->Ubicacion = $Ubicacion;
    $this->Disponibilidad = $Disponibilidad;

    }

}

?>