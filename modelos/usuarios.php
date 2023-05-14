<?php

class Usuario {

    public $identificacion;
    public $contraseña;
    public $estudianteNumeroIdentificacion;
    public $estudianteTipoIdentificacion;
    public $tipo;

        public function __construct($identificacion,$contraseña="",$estudianteNumeroIdentificacion="",$estudianteTipoIdentificacion="",
        $tipo="")
        {
            $this->identificacion = $identificacion;
            $this->contraseña = $contraseña;
            $this->estudianteNumeroIdentificacion = $estudianteNumeroIdentificacion;
            $this->estudianteTipoIdentificacion = $estudianteTipoIdentificacion;
            $this->tipo = $tipo;
        }

}

?>