<?php

class Estudiante {

    public $Identificador;
    public $NombreUsuario;
    public $Contraseña;
    public $NumeroIdentificacion;
    public $TipoIdentificacion;
    public $Nombres;
    public $Apellidos;
    public $FechaNacimiento;
    public $TipoSangre;
    public $Foto;
    public $Programa;
    public $NombreRol;

    public function __construct($Identificador = '',$NombreUsuario = '',$Contraseña = '',$NumeroIdentificacion ='',$TipoIdentificacion='',
    $Nombres = '',$Apellidos = '',$FechaNacimiento = '',$TipoSangre = '',$Foto = '', $Programa= '', $NombreRol = ''){

    $this->Identificador = $Identificador;
    $this->NombreUsuario = $NombreUsuario;    
    $this->Contraseña = $Contraseña;
    $this->NumeroIdentificacion = $NumeroIdentificacion;
    $this->TipoIdentificacion = $TipoIdentificacion;
    $this->Nombres = $Nombres;
    $this->Apellidos = $Apellidos;
    $this->FechaNacimiento = $FechaNacimiento;
    $this->TipoSangre = $TipoSangre;
    $this->Foto =$Foto;
    $this->Programa = $Programa;
    $this->NombreRol = $NombreRol;

    }

}

?>