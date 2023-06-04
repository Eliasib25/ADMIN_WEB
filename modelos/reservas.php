<?php

class Reserva {

    public $Identificador;
    public $HoraInicio;
    public $Fecha;
    public $EstadoReserva;
    public $Placa_Vehiculo;
    public $HoraFin;
    public $NumeroIdentificacion;
    public $NumeroPuesto;

    public function __construct($Identificador = '',$HoraInicio = '',$Fecha = '',$EstadoReserva ='',$Placa_Vehiculo='',
    $HoraFin = '',$NumeroIdentificacion = '',$NumeroPuesto = ''){

    $this->Identificador = $Identificador;
    $this->HoraInicio = $HoraInicio;    
    $this->Fecha = $Fecha;
    $this->EstadoReserva = $EstadoReserva;
    $this->Placa_Vehiculo = $Placa_Vehiculo;
    $this->HoraFin = $HoraFin;
    $this->NumeroIdentificacion = $NumeroIdentificacion;
    $this->NumeroPuesto = $NumeroPuesto;

    }

}

?>