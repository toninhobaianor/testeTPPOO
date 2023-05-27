<?php
include_once("../libs/global.php");

class CategoriaProgramaMilhagem
{
    private string $nome;
    private int $valor;

    // static $local_filename = "categoriaProgramaMilhagem.txt";


    public function __construct(string $nome, int $valor)
    {
        $this->setNome($nome);
        $this->setValor($valor);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getValor(): int
    {
        return $this->valor;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setValor(int $valor)
    {
        $this->valor = $valor;
    }

    // static public function getFilename()
    // {
    //     return get_called_class()::$local_filename;
    // }
}
