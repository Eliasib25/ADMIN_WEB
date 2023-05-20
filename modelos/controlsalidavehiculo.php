<?php

class ControlSalidaVehiculo {

    public $Id;
    public $EstadoPuesto;
    public $Numero;
    public $parqueadero_id;

    public function __construct($Id = '',$EstadoPuesto = '',$Numero = '',$parqueadero_id =''){

    $this->Id = $Id;
    $this->EstadoPuesto = $EstadoPuesto;    
    $this->Numero = $Numero;
    $this->parqueadero_id = $parqueadero_id;

    }

}

?>