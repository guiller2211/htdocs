<?php
class PacienteModel
{
    private $id;
    private $rut;
    private $nombre;
    private $apPat;
    private $apMat;
    private $telefono;
    private $direccion;
    private $mail;
    private $fechaNacimiento;
    private $genero;
    private $centro_codigo;
    private $fechaExamen;


    // Getters

    public function getId()
    {
        return $this->id;
    }

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
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    public function getGenero()
    {
        return $this->genero;
    }
    public function getCentro_Codigo()
    {
        return $this->centroCodigo;
    }
    public function getFechaExamen()
    {
        return $this->fechaExamen;
    }

    //setters 
    public function setRut($rut)
    {
        $this->rut = $rut;
    }
}
?>