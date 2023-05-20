<?php
include_once("../libs/global.php");

class Endereco
{
    private string $rua;
    private string $numero;
    private string $complemento;
    private string $cep;
    private string $cidade;
    private string $estado;

    private string $coordenadaX;
    private string $coordenadaY;

    // static $local_filename = "enderecos.txt";


    function __construct(string $rua, string $numero, string $complemento, string $cep, string $cidade, string $estado)
    {
        $this->setRua($rua);
        $this->setNumero($numero);
        $this->setComplemento($complemento);
        $this->setCep($cep);
        $this->setCidade($cidade);
        $this->setEstado($estado);
    }

    public function getEndCompleto()
    {
        return $this->rua . ", " . $this->numero . ", " . $this->complemento . ", " . $this->cep . ", " . $this->cidade . ", " . $this->estado;
    }


    public function getRua(): string
    {
        return $this->rua;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function getCoordenadaX(): string
    {
        return $this->coordenadaX;
    }

    public function getCoordenadaY(): string
    {
        return $this->coordenadaY;
    }

    public function setRua(string $rua): void
    {
        $this->rua = $rua;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function setComplemento(string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function setCoordenadaX(string $coordenadaX): void
    {
        $this->coordenadaX = $coordenadaX;
    }

    public function setCoordenadaY(string $coordenadaY): void
    {
        $this->coordenadaY = $coordenadaY;
    }

    // static public function getFilename()
    // {
    //     return get_called_class()::$local_filename;
    // }
}
