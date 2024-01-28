<?php

class Registro_Examen
{

    private $Fecha;
    private $Nombre;
    private $ApMat;
    private $Mail;
    private $Rut;
    private $ApPat;
    private $Telefono;
    private $Opciones;
    private $Direccion;

    public function getFecha()
    {
        return $this->Fecha;
    }


    public function getNombre()
    {
        return $this->Nombre;
    }


    public function getApPat()
    {
        return $this->ApPat;
    }


    public function getApMat()
    {
        return $this->ApMat;
    }


    public function getTelefono()
    {
        return $this->Telefono;
    }


    public function getDireccion()
    {
        return $this->Direccion;
    }


    public function getMail()
    {
        return $this->Mail;
    }


    public function getRut()
    {
        return $this->Rut;
    }


    public function getOpciones()
    {
        return $this->Opciones;
    }


    public function SetRut($Rut)
    {
        $this->Rut = $Rut;
    }
    public function SetNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }
    public function SetApPat($ApPat)
    {
        $this->ApPat = $ApPat;
    }
    public function SetApMat($ApMat)
    {
        $this->ApMat = $ApMat;
    }
    public function SetTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
    }
    public function SetDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }
    public function SetMail($Mail)
    {
        $this->Mail = $Mail;
    }
    public function SetFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }
    public function SetOpciones($Opciones)
    {
        $this->Opciones = $Opciones;
    }
}