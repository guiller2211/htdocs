<?php

class Paciente_Model
{

    private $rut;
    private $nombre;
    private $apPat;
    private $apMat;
    private $telefono;
    private $direccion;
    private $mail;
    private $Fnac;
    private $genero;

    public function getRut()
    {
        return $this->rut;
    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function getApPat()
    {
        return $this->apPat;
    }


    public function getApMat()
    {
        return $this->apMat;
    }


    public function getTelefono()
    {
        return $this->telefono;
    }


    public function getDireccion()
    {
        return $this->direccion;
    }


    public function getMail()
    {
        return $this->mail;
    }


    public function getFnac()
    {
        return $this->Fnac;
    }


    public function getGenero()
    {
        return $this->genero;
    }


    public function SetRut($rut)
    {
        $this->rut = $rut;
    }
    public function SetNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function SetApPat($apPat)
    {
        $this->apPat = $apPat;
    }
    public function SetApMat($apMat)
    {
        $this->apMat = $apMat;
    }
    public function SetTelefono($telefono)
    {
        $this->telefono = $telefono;
    }
    public function SetDireccion($direccion)
    {
        $this->direccion = $direccion;
    }
    public function SetMail($mail)
    {
        $this->mail = $mail;
    }
    public function SetFnac($Fnac)
    {
        $this->Fnac = $Fnac;
    }
    public function SetGenero($genero)
    {
        $this->genero = $genero;
    }
}