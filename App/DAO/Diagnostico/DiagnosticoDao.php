<?php

interface DiagnosticoDao
{
    public function getDatadiagnostico();
    public function getEstadosDiagnostico();
    public function getAllExamenesFilter($idExamen, $nombre, $fechaCreacion);
}
