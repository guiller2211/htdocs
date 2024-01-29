<?php
require_once __DIR__ . '/../../Models/Paciente_model.php';
require_once __DIR__ . '/../../Models/Examen_model.php';

interface RecepDao{
    public function insertUser(PacienteModel $admin);
    public function insertExamen(ExamenModel $admin);
}