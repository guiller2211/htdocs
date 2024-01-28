<?php

interface RecepcionDao
{
    public function getRegistroRecepcion();
    public function buscarRut(RecepcionModel $recepcion);
}
