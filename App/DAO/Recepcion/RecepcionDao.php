<?php
require_once __DIR__ . '/../../Models/Paciente_model.php';
interface RecepcionDao
{
    function getRegistroRecepcion();
    function buscarRut(PacienteModel $paciente);
    function consultaExamenRut(PacienteModel $paciente);
    function getUsuarios();
    function insertUser(PacienteModel $admin);
    function insertExamen(ExamenModel $admin);
    public function getDataPacienteById(pacienteModel $id);// busco examene de ese id

}
