<?php
require_once __DIR__ . '/../../Models/Paciente_Model.php';
require_once __DIR__ . '/../../Models/Registro_Examen.php';

interface RecepDao{
    public function insertUser(Paciente_Model $admin);
    public function insertExamen(Registro_Examen $admin);
}