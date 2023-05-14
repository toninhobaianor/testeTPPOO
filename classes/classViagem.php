<?php
include_once("../libs/global.php");

class Viagem extends persist
{
  public string $aeroportoOrigem;
  private string $aeroportoDestino;
  private string $conexao;
  private DateTime $horarioPartida;
  private DateTime $horarioChegada;
  private float $duracaoEstimada;
  private string $companhiaAerea;
  private Aeronave $aeronave;
  private float $carga;

  private $passageiros = array();

  static $local_filename = "viagens.txt";

  public function __construct(string $aeroportoOrigem, string $aeroportoDestino, DateTime $horarioPartida, DateTime $horarioChegada, float $duracaoEstimada, string $companhiaAerea, Aeronave $aeronave, float $carga)
  {
    $this->setAeroportoOrigem($aeroportoOrigem);
    $this->setAeroportoDestino($aeroportoDestino);
    $this->setHorarioPartida($horarioPartida);
    $this->setHorarioChegada($horarioChegada);
    $this->setDuracaoEstimada($duracaoEstimada);
    $this->setCompanhiaAerea($companhiaAerea);
    $this->setAeronave($aeronave);
    //$this->passageiros = $passageiros;
    $this->setCarga($carga);
    //$this->conexao = $conexao;
  }



  public function getAeroportoOrigem()
  {
    return $this->aeroportoOrigem;
  }

  public function getAeroportoDestino()
  {
    return $this->aeroportoDestino;
  }

  public function getHorarioPartida()
  {
    return $this->horarioPartida;
  }

  public function getHorarioChegada()
  {
    return $this->horarioChegada;
  }

  public function getDuracaoEstimada()
  {
    return $this->duracaoEstimada;
  }

  public function getCompanhiaAerea()
  {
    return $this->companhiaAerea;
  }

  public function getAeronave()
  {
    return $this->aeronave;
  }

  public function getCarga()
  {
    return $this->carga;
  }

  public function setAeroportoOrigem(string $aeroportoOrigem)
  {
    $this->aeroportoOrigem = $aeroportoOrigem;
  }

  public function setAeroportoDestino(string $aeroportoDestino)
  {
    $this->aeroportoDestino = $aeroportoDestino;
  }

  public function setHorarioPartida(DateTime $horarioPartida)
  {
    $this->horarioPartida = $horarioPartida;
  }

  public function setHorarioChegada(DateTime $horarioChegada)
  {
    $this->horarioChegada = $horarioChegada;
  }

  public function setDuracaoEstimada(float $duracaoEstimada)
  {
    $this->duracaoEstimada = $duracaoEstimada;
  }

  public function setCompanhiaAerea(string $companhiaAerea)
  {
    $this->companhiaAerea = $companhiaAerea;
  }

  public function setAeronave(Aeronave $aeronave)
  {
    // verificar capacidade de carga e passageiros antes de alterar
    $this->aeronave = $aeronave;
  }

  public function setCarga(float $carga)
  {
    $this->carga = $carga;
  }

  // public function inserirPassageiro(Passageiro $novoPassageiro)
  // {
  // }

  // public function removerPassageiro(Passageiro $novoPassageiro)
  // {
  // }

  public function inserirCarga(float $novaCarga)
  {
    // depois precisamos conferir se já atingiu
    // a capacidade máxima de carga
    $this->carga = $this->carga + $novaCarga;
  }

  public function removerCarga(float $novaCarga)
  {
    // verificar se nao e negativo  
    $this->carga = $this->carga - $novaCarga;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
