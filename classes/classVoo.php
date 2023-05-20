<?php
include_once("../libs/global.php");

class Voo extends persist
{
  private array $frequencia;
  protected int $aeroportoOrigem;
  private int $aeroportoDestino;
  private ?Aeronave $aeronave;
  private ?int $companhiaAerea;
  private ?int $piloto;
  private ?int $copiloto;
  private ?array $listaComissarios;
  private DateTime $previsaoPartida;
  private DateTime $previsaoChegada;
  private DateInterval $previsaoDuracao;
  private ?string $codigoVoo;

  static $local_filename = "voos.txt";


  static function criarVooCompleto(array $frequencia, int $aeroportoOrigem, int $aeroportoDestino, DateTime $previsaoPartida, DateTime $previsaoChegada, ?int $companhiaAerea,  ?Aeronave $aeronave, ?int $piloto, ?int $copiloto, ?array $comissarios, ?string $codigoVoo)
  {
    $validaCodigoVoo = self::validaCodigoVoo($codigoVoo);

    if ($validaCodigoVoo == 1) {
      $voo = new Voo($frequencia, $aeroportoOrigem, $aeroportoDestino, $previsaoPartida, $previsaoChegada);

      $voo->setCompanhiaAerea($companhiaAerea);
      $voo->setAeronave($aeronave);
      $voo->setPiloto($piloto);
      $voo->setCopiloto($copiloto);
      $voo->setListaComissarios($comissarios);
      $voo->setCodigoVoo($codigoVoo);

      return $voo;
    } else {
      print_r("Erro ao criar voo: " . $validaCodigoVoo . "\n");
      return NULL;
    }
  }

  public function __construct(array $frequencia, int $aeroportoOrigem, int $aeroportoDestino, DateTime $previsaoPartida, DateTime $previsaoChegada)
  {
    $this->setFrequencia($frequencia);
    $this->setAeroportoOrigem($aeroportoOrigem);
    $this->setAeroportoDestino($aeroportoDestino);
    $this->setPrevisaoPartida($previsaoPartida);
    $this->setPrevisaoChegada($previsaoChegada);

    $this->setPrevisaoDuracao($previsaoChegada, $previsaoPartida);

    $this->setAeronave(SEM_AERONAVE_DEFINIDA);
    $this->setCompanhiaAerea(SEM_COMPANHIA_AEREA_DEFINIDA);
    $this->setPiloto(SEM_PILOTO_DEFINIDO);
    $this->setCopiloto(SEM_PILOTO_DEFINIDO);

    // $this->setListaComissarios(SEM_COMISSARIO_DEFINIDO);
    $this->listaComissarios = array();

    $this->setCodigoVoo(SEM_CODIGO_VOO_DEFINIDO);
  }

  public function alterarVoo(Voo $novoVoo)
  {
    $this->setFrequencia($novoVoo->getFrequenciaArray());
    $this->setAeroportoOrigem($novoVoo->getAeroportoOrigem());
    $this->setAeroportoDestino($novoVoo->getAeroportoDestino());
    $this->setPrevisaoPartida($novoVoo->getPrevisaoPartida());
    $this->setPrevisaoChegada($novoVoo->getPrevisaoChegada());
    $this->setPrevisaoDuracao($novoVoo->getPrevisaoChegada(), $novoVoo->getPrevisaoPartida());
    $this->setCompanhiaAerea($novoVoo->getCompanhiaAerea());
    $this->setAeronave($novoVoo->getAeronave());
    $this->setPiloto($novoVoo->getPiloto());
    $this->setCopiloto($novoVoo->getCopiloto());
    $this->setListaComissarios($novoVoo->getListaComissariosArray());
    $this->setCodigoVoo($novoVoo->getCodigoVoo());
  }

  public function getFrequenciaString()
  {
    // return $this->frequencia;
    $freqString = "";

    // print_r("Count: " . count($this->frequencia) . "\n");

    $tamanhoArrayFreq = count($this->frequencia);

    $i = 0;

    foreach ($this->frequencia as $dia) {
      $i++;

      $freqString .= $dia;

      if ($i < $tamanhoArrayFreq) {
        $freqString .= ",";
      }
    }

    return $freqString;
  }

  public function getFrequenciaArray()
  {
    return $this->frequencia;
  }

  public function getAeroportoOrigem()
  {
    return $this->aeroportoOrigem;
  }

  public function getAeroportoDestino()
  {
    return $this->aeroportoDestino;
  }

  public function getCompanhiaAerea()
  {
    return $this->companhiaAerea;
  }

  public function getAeronave()
  {
    return $this->aeronave;
  }

  public function getPiloto()
  {
    return $this->piloto;
  }

  public function getCopiloto()
  {
    return $this->copiloto;
  }

  public function getListaComissariosString()
  {
    // return $this->frequencia;
    $comissariosString = "";

    // print_r("Count: " . count($this->frequencia) . "\n");

    $tamanhoArrayFreq = count($this->listaComissarios);

    if ($tamanhoArrayFreq == 0) {

      $comissariosString = SEM_COMISSARIO_DEFINIDO;

      return $comissariosString;
    } else {

      $i = 0;

      foreach ($this->listaComissarios as $dia) {
        $i++;

        $comissariosString .= $dia;

        if ($i < $tamanhoArrayFreq) {
          $comissariosString .= ",";
        }
      }

      return $comissariosString;
    }
  }

  public function getListaComissariosArray()
  {
    return $this->listaComissarios;
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
    // return $this->previsaoDuracao->format("%H:%I");
  }

  public function getCodigoVoo()
  {
    return $this->codigoVoo;
  }

  // public function getViagem()
  // {
  //   return $this->viagem;
  // }

  public function setFrequencia(array $frequencia)
  {
    $this->frequencia = $frequencia;
  }

  public function setAeroportoOrigem(int $aeroportoOrigem)
  {
    $this->aeroportoOrigem = $aeroportoOrigem;
  }

  public function setAeroportoDestino(int $aeroportoDestino)
  {
    $this->aeroportoDestino = $aeroportoDestino;
  }

  public function setCompanhiaAerea(?int $companhiaAerea)
  {
    $this->companhiaAerea = $companhiaAerea;
  }

  public function setAeronave(?Aeronave $aeronave)
  {
    $this->aeronave = $aeronave;
  }

  public function setPiloto(?int $piloto)
  {
    $this->piloto = $piloto;
  }

  public function setCopiloto(?int $copiloto)
  {
    $this->copiloto = $copiloto;
  }

  public function setListaComissarios(?array $listaComissarios)
  {
    $this->listaComissarios = $listaComissarios;
  }

  public function addListaComissarios(Comissario $comissario)
  {
    // $this->listaComissarios[] = $comissario;
    array_push($this->listaComissarios, $comissario);
  }

  public function setPrevisaoPartida(DateTime $previsaoPartida)
  {
    $this->previsaoPartida = $previsaoPartida;
  }

  public function setPrevisaoChegada(DateTime $previsaoChegada)
  {
    $this->previsaoChegada = $previsaoChegada;
  }

  public function setPrevisaoDuracao(DateTime $previsaoChegada, DateTime $previsaoPartida)
  {
    $this->previsaoDuracao = $previsaoChegada->diff($previsaoPartida);
  }

  public function setCodigoVoo(?string $codigoVoo)
  {
    $this->codigoVoo = $codigoVoo;
  }

  // public function setViagem(Viagem $viagem)
  // {
  //   $this->viagem = $viagem;
  // }

  // public function alteraViagem(Viagem $novaViagem)
  // {
  //   // conferir depois as verificacoes para a troca de viagem
  //   $this->viagem = $novaViagem;
  // }

  static public function validaCodigoVoo()
  {
    return 1;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
