<?php
require_once __DIR__ . '/../../Models/Paciente_Model.php';
require_once __DIR__ . '/../../Models/Examen_model.php';

interface RecepDao{
    public function insertUser(Paciente_Model $admin);
    public function insertExamen(ExamenModel $admin);
}