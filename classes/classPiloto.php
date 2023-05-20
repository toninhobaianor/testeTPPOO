<?php
include_once("../libs/global.php");

// define("PILOTO", 1);
// define("COMISSARIO", 2);

class Piloto extends Tripulante
{

    private int $tipoTripulante = PILOTO;

    static $local_filename = "pilotos.txt";
}
