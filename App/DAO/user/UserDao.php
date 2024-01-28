<?php
require_once __DIR__ . '/../../Models/usuario_model.php';
interface UserDao
{ 
    public function getDataPaciente($buscador, $procedencia);
    public function getDataResultados($buscador);   
    public function fechasexamen($buscador);


}

