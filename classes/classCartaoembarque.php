<?php
include_once("../libs/global.php");

class Cartaoembarque extends persist{
    private string $nome;
    private string $sobrenome;
    private int $origem;
    private int $destino;
    private DateTime $horarioembarque;
    private DateTime $horariodesaida;
    private string $assento;

    public function __construct(string $nome,string $sobrenome,int $origem,int $destino,DateTime $embarque,DateTime $horariodesaida,string $assento){
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setOrigem($origem);
        $this->setDestino($destino);
        $this->setHorarioEmarque($embarque);
        $this->setHorariodeSaida($horariodesaida);
        $this->setAssento($assento);
    }

    public function getNome()
    {
      return $this->nome;
    }
  
    public function setNome(string $nome)
    {
      $this->nome = $nome;
    }
  
    public function getSobrenome()
    {
      return $this->sobrenome;
    }
  
    public function setSobrenome(string $sobrenome)
    {
      $this->sobrenome = $sobrenome;
    }

    public function getOrigem()
    {
      return $this->origem;
    }

    public function setOrigem(int $origem)
    {
      $this->origem = $origem;
    }
  
    public function getDestino()
    {
      return $this->destino;
    }

    public function setDestino(int $Destino)
    {
        $this->destino = $Destino;
    }

    public function getHorarioEmbarque()
    {
        return $this->horarioembarque;
    }

    public function setHorarioEmbarque(DateTime $horarioPartida)
    {
        $this->horarioembarque = $horarioPartida;
    }

    public function getHorariodeSaida()
    {
      return $this->horariodesaida;
    } 

    public function setHorariodeSaida(DateTime $horarioChegada)
    {
     $this->horariodesaida = $horarioChegada;
    }
  
    public function getAssento()
    {
        return $this->assento;
    }

    public function setAssento(string $assento)
    {
        $this->assento = $assento;
    } 
}