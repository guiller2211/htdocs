<?php
class ExamenModel
{
    private $id;
    private $pacienteId;
    private $diagnosticoCodigo;
    private $fecha;
    private $centroCodigo;
    private $resultado;
    private $fechaEntrega;


    // Getters

    public function getId()
    {
        return $this->id;
    }

    public function getPacienteId()
    {
        return $this->pacienteId;
    }

    public function getDiagnosticoCodigo()
    {
        return $this->diagnosticoCodigo;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function getCentroCodigo()
    {
        return $this->centroCodigo;
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    // Setters


    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPacienteId($pacienteId)
    {
        $this->pacienteId = $pacienteId;
    }

    public function setDiagnosticoCodigo($diagnosticoCodigo)
    {
        $this->diagnosticoCodigo = $diagnosticoCodigo;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setCentroCodigo($centroCodigo)
    {
        $this->centroCodigo = $centroCodigo;
    }

    public function setResultado($resultado)
    {
        $this->resultado = $resultado;
    }

    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;
    }

}
