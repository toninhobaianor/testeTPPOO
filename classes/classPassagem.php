<?php
include_once("../libs/global.php");

// DEFINE('PESO_FRANQUIA_BAGAGEM', 23);

class Passagem extends persist
{
  private string $siglaAeroportoOrigem;
  private string $siglaAeroportoDestino;
  private float $preco;
  private string $assento;
  private int $franquiasBagagem;
  private Passageiro $passageiro;
  private Cliente $cliente;
  private string $statusPassagem;
  private array $listaViagensEConexoes;
  private float $pesoTotal;

  static $local_filename = "passagens.txt";

  public function __construct(string $siglaAeroportoOrigem, string $siglaAeroportoDestino, float $preco, string $assento, int $franquiasBagagem, Passageiro $passageiro, Cliente $cliente, array $listaViagensEConexoes)
  {
    $this->setSiglaAeroportoOrigem($siglaAeroportoOrigem);
    $this->setSiglaAeroportoDestino($siglaAeroportoDestino);
    $this->setPreco($preco);
    $this->setAssento($assento);
    $this->setFranquiasBagagem($franquiasBagagem);
    $this->setPassageiro($passageiro);
    $this->setCliente($cliente);
    $this->statusPassagem = "Passagem adquirida";
    $this->setlistaViagensEConexoes($listaViagensEConexoes);
  }

  public function getSiglaAeroportoOrigem()
  {
    return $this->siglaAeroportoOrigem;
  }

  public function getSiglaAeroportoDestino()
  {
    return $this->siglaAeroportoDestino;
  }

  public function getPreco()
  {
    return $this->preco;
  }

  public function getAssento()
  {
    return $this->assento;
  }

  public function getFranquiasBagagem()
  {
    return $this->franquiasBagagem;
  }

  public function getPassageiro()
  {
    return $this->passageiro;
  }

  public function getCliente()
  {
    return $this->cliente;
  }
  public function getStatus()
  {
    if(isset($this->statusPassagem))
    {
      return $this->statusPassagem;
    }
  }

  public function setSiglaAeroportoOrigem(string $siglaAeroportoOrigem)
  {
    $this->siglaAeroportoOrigem = $siglaAeroportoOrigem;
  }

  public function setSiglaAeroportoDestino(string $siglaAeroportoDestino)
  {
    $this->siglaAeroportoDestino = $siglaAeroportoDestino;
  }

  public function setPreco(float $preco)
  {
    $this->preco = $preco;
  }

  public function setAssento(string $assento)
  {
    $this->assento = $assento;
  }

  public function setFranquiasBagagem(int $franquiasBagagem)
  {
    $this->franquiasBagagem = $franquiasBagagem;
  }

  public function setPassageiro(Passageiro $passageiro)
  {
    $this->passageiro = $passageiro;
  }

  public function setCliente(Cliente $cliente)
  {
    $this->cliente = $cliente;
  }
  public function setStatus(string $status)
  {
    $this->statusPassagem = $status;
  }
  public function getlistaViagensEConexoes()
  {
    return $this->listaViagensEConexoes;
  }
  public function setlistaViagensEConexoes(array $listaViagensEConexoes)
  {
    $this->listaViagensEConexoes = $listaViagensEConexoes;
  }

  public function setPesoTotal(int $franquiasBagagem)
  {
    $this->pesoTotal = $franquiasBagagem * PESO_FRANQUIA_BAGAGEM;
  }
  public function getPesoTotal()
  {
    return $this->pesoTotal;
  }

  public function alteracaoPassagem(Passagem $novaPassagem)
  {
    //conferir oq faz sentido ser mudado e talvez passa função para a classe Viagem
    $this->setSiglaAeroportoOrigem($novaPassagem->getSiglaAeroportoOrigem());
    $this->setSiglaAeroportoDestino($novaPassagem->getSiglaAeroportoDestino());
    $this->setAssento($novaPassagem->getAssento());
    $this->setFranquiasBagagem($novaPassagem->getFranquiasBagagem());
    $this->setPassageiro($novaPassagem->getPassageiro());
    $this->setStatus($novaPassagem->getStatus());
    $this->setlistaViagensEConexoes($novaPassagem->getlistaViagensEConexoes());
  }
  
  // public function cancelamentoDePassagem()
  // {
  //   $this->setStatus("Passagem cancelada");
  //   $viagem->removerPassageiro($this);
  // }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}