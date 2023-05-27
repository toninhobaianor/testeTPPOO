<?php
include_once("../libs/global.php");

class PontoMilha extends persist
{
    private int $valor;
    private DateTime $dataValidade;

    static $local_filename = "pontosMilha.txt";


    public function __construct(int $valor, DateTime $dataValidade)
    {
        $this->setValor($valor);
        $this->setDataValidade($dataValidade);
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function setValor(int $valor)
    {
        $this->valor = $valor;
    }

    public function getDataValidade(): DateTime
    {
        return $this->dataValidade;
    }

    public function setDataValidade(DateTime $dataValidade)
    {
        $this->dataValidade = $dataValidade;
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
