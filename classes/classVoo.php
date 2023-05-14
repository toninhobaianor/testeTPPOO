<?php
include_once("../libs/global.php");

class Voo extends persist
{
  private $frequencia = array();

  private DateTime $previsaoPartida;
  private DateTime $previsaoChegada;
  private float $previsaoDuracao;
  private string $codigoVoo;
  private Viagem $viagem;

  private $listaViagens = array();

  static $local_filename = "voos.txt";


  public function __construct(array $frequencia, DateTime $previsaoPartida, DateTime $previsaoChegada, float $previsaoDuracao, array $listaViagens, string $codigoVoo)
  {
    $this->setFrequencia($frequencia);
    $this->setPrevisaoPartida($previsaoPartida);
    $this->setPrevisaoChegada($previsaoChegada);
    $this->setPrevisaoDuracao($previsaoDuracao);
    $this->setCodigoVoo($codigoVoo);

    $this->listaViagens = $listaViagens;
  }

  public function getFrequencia()
  {
    return $this->frequencia;
  }

  public function getPrevisaoPartida()
  {
    return $this->previsaoPartida;
  }

  public function getPrevisaoChegada()
  {
    return $this->previsaoChegada;
  }

  public function getPrevisaoDuracao()
  {
    return $this->previsaoDuracao;
  }

  public function getCodigoVoo()
  {
    return $this->codigoVoo;
  }

  public function getViagem()
  {
    return $this->viagem;
  }

  public function setFrequencia(array $frequencia)
  {
    $this->frequencia = $frequencia;
  }

  public function setPrevisaoPartida(DateTime $previsaoPartida)
  {
    $this->previsaoPartida = $previsaoPartida;
  }

  public function setPrevisaoChegada(DateTime $previsaoChegada)
  {
    $this->previsaoChegada = $previsaoChegada;
  }

  public function setPrevisaoDuracao(float $previsaoDuracao)
  {
    $this->previsaoDuracao = $previsaoDuracao;
  }

  public function setCodigoVoo(string $codigoVoo)
  {
    $this->codigoVoo = $codigoVoo;
  }

  public function setViagem(Viagem $viagem)
  {
    $this->viagem = $viagem;
  }

  public function alteraViagem(Viagem $novaViagem)
  {
    // conferir depois as verificacoes para a troca de viagem
    $this->viagem = $novaViagem;
  }

  public function validaCodigoVoo()
  {
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
