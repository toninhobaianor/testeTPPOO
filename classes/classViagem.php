<?php
include_once("../libs/global.php");

class Viagem extends persist
{
  private DateTime $horarioPartida;
  private DateTime $horarioChegada;
  private DateInterval $duracao;
  //private Aeronave $aeronave;
  private float $carga;
  private ?array $passageiros;
  private int $voo;
  private int $milhasViagem;
  private float $valorViagem;
  private float $valorFranquiaBagagem;


  static $local_filename = "viagens.txt";

  public function __construct(DateTime $horarioPartida, DateTime $horarioChegada, float $carga, int $voo, int $milhasViagem, float $valorViagem, float $valorFranquiaBagagem)
  {
    // $this->setAeroportoOrigem($aeroportoOrigem);
    // $this->setAeroportoDestino($aeroportoDestino);
    $this->setHorarioPartida($horarioPartida);
    $this->setHorarioChegada($horarioChegada);
    $this->setDuracao($horarioPartida, $horarioChegada);
    $this->setAeronave($aeronave);
    $this->setCarga($carga);
    $this->setVoo($voo);
    $this->setMilhasViagem($milhasViagem);
    $this->setvalorViagem($valorViagem);
    $this->setvalorFranquiaBagagem($valorFranquiaBagagem);

    $this->passageiros = array();
  }

  // public function getAeroportoOrigem()
  // {
  //   return $this->aeroportoOrigem;
  // }

  // public function getAeroportoDestino()
  // {
  //   return $this->aeroportoDestino;
  // }

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
    return $this->duracao;
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

  // public function setAeroportoOrigem(string $aeroportoOrigem)
  // {
  //   $this->aeroportoOrigem = $aeroportoOrigem;
  // }

  // public function setAeroportoDestino(string $aeroportoDestino)
  // {
  //   $this->aeroportoDestino = $aeroportoDestino;
  // }

  public function setHorarioPartida(DateTime $horarioPartida)
  {
    $this->horarioPartida = $horarioPartida;
  }

  public function setHorarioChegada(DateTime $horarioChegada)
  {
    $this->horarioChegada = $horarioChegada;
  }

  public function setDuracao(DateTime $horarioPartida, DateTime $horarioChegada)
  {
    $this->duracao = $horarioChegada->diff($horarioPartida);
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
    $this->carga += $carga;
  }

  public function setVoo($voo)
  {
    $this->voo = $voo;
  }

  public function setMilhasViagem($milhasViagem)
  {
    $this->milhasViagem = $milhasViagem;
  }

  public function setvalorViagem($valorViagem)
  {
    $this->valorViagem = $valorViagem;
  }

  public function setvalorFranquiaBagagem($valorFranquiaBagagem)
  {
    $this->valorFranquiaBagagem = $valorFranquiaBagagem;
  }
  //***Falta testar as funcoes comentadas abaixo***
  
  // public function inserirPassageiro($novaPassagem)
  // {
  //   //qualquer tipo de verificacao deve ser feita na hora da venda (carga e assentos)
  //   array_push($passageiros, $novaPassagem->getPassageiro());
  //   $this->setCarga($novaPassagem->getPesoTotal()); 
  // }

  // public function removerPassageiro($passagemRemovida)
  // {
  //   $cpfDoPassageiro = $passagemRemovida->getPassageiro()->getCpf();
  //   $key = array_search($cpfDoPassageiro, $this->passageiros);
  //   if($key !== false)
  //   {
  //     unset($passageiros[$key]);
  //     $cargaRemovida = -($passagemRemovida->getPesoTotal());
  //     $this->setCarga($cargaRemovida);
  //   }
  // }

  // public function fazerCheckIn ($passagem)
  // {
  //   $passagem->setSatus("Check-in realizado");
  // }

  // public function cancelamentoDePassagem($passagem)
  //   {
  //     $passagem->setStatus("Passagem cancelada");
  //     $this->removerPassageiro($passagem);
  //   }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
