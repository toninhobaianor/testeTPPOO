<?php
include_once("../libs/global.php");

class Comissario extends Tripulante
{
    private int $tipoTripulante = COMISSARIO;

    static $local_filename = "comissarios.txt";
}
