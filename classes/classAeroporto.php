<?php
include_once("../libs/global.php");

class Aeroporto extends persist
{
  private string $sigla;
  private string $cidade;
  private string $estado;

  private $listaVoos = array();
  private $listaCompanhiasAereas = array();
  private $listaAeroportos = array();

  static $local_filename = "aeroportos.txt";

  // public function __construct(string $sigla, string $cidade, string $estado, array $listaVoos, array $listaCompanhiasAereas, array $listaAeroportos)
  public function __construct(string $sigla, string $cidade, string $estado)
  {
    $this->setSigla($sigla);
    $this->setCidade($cidade);
    $this->setEstado($estado);

    // $this->listaVoos = $listaVoos;
    // $this->listaCompanhiasAereas = $listaCompanhiasAereas;

    // Quais serao os aeroportos dessa lista? Todos? Só os que temos voos?
    // - Se for todos, acho merda pq vamos precisar ficar atualizando sempre que um novo aeroporto for criado
    // - Se for só os que temos voos, já temos essa lista nos voos
    //
    // Fiquei pensando depois se Aeroporto precisa dessa lista.
    // Pensei em deixar essa lista na "classeSistema", que seria a "main" e que chamaria todas as outras.
    // $this->listaAeroportos = $listaAeroportos;
  }

  public function getSigla()
  {
    return $this->sigla;
  }

  public function getCidade()
  {
    return $this->cidade;
  }

  public function getEstado()
  {
    return $this->estado;
  }

  public function setSigla(string $sigla)
  {
    $this->sigla = $sigla;
  }

  public function setCidade(string $cidade)
  {
    $this->cidade = $cidade;
  }

  public function setEstado(string $estado)
  {
    $this->estado = $estado;
  }

  public function cadastraNovoVoo(Voo $novoVoo)
  {
    array_push($this->listaVoos, $novoVoo);
  }

  public function cadastraNovaCompanhiaAerea(int $indexCompAerea)
  {
    array_push($this->listaCompanhiasAereas, $indexCompAerea);
  }

  public function getCompanhiasAereas()
  {
    return $this->listaCompanhiasAereas;
  }

  public function cadastraNovoAeroporto(Aeroporto $novoAeroporto)
  {
    array_push($this->listaAeroportos, $novoAeroporto);
  }

  public function getTodosOsAeroportos()
  {
    $listaAeroportos = Aeroporto::getRecords();

    return $listaAeroportos;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
