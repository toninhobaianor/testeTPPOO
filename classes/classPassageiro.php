<?php
include_once("../libs/global.php");

// define('VAZIO', '');

class Passageiro extends persist
{

  private bool $tipoPassageiro;
  private string $nome;
  private string $sobrenome;
  private string $rg;
  private string $passaporte;
  private string $documentoIdentificacao;
  private string $cpf;
  private string $nacionalidade;
  private string $dataDeNascimento;
  private string $email;
  private array $listaPassagens;
  private array $historicoViagens;

  static $local_filename = "passageiros.txt";

  public function __construct(bool $tipoPassageiro, string $nome, string $sobrenome, string $documentoIdentificacao, string $cpf, string $nacionalidade, string $dataDeNascimento, string $email)
  {
    $this->setTipoPassageiro($tipoPassageiro);
    $this->setNome($nome);
    $this->setSobrenome($sobrenome);
    $this->setDocumentoIdentificacao($documentoIdentificacao);
    $this->setCpf($cpf);
    $this->setNacionalidade($nacionalidade);
    $this->setDataDeNascimento($dataDeNascimento);
    $this->setEmail($email);

    $this->listaPassagens = array();
    $this->historicoViagens = array();
  }

  public function getTipoPassageiro(): bool
  {
    return $this->tipoPassageiro;
  }

  public function setTipoPassageiro(bool $tipoPassageiro): void
  {
    $this->tipoPassageiro = $tipoPassageiro;
  }

  public function getNome(): string
  {
    return $this->nome;
  }

  public function setNome(string $nome): void
  {
    $this->nome = $nome;
  }

  public function getSobrenome(): string
  {
    return $this->sobrenome;
  }

  public function setSobrenome(string $sobrenome): void
  {
    $this->sobrenome = $sobrenome;
  }

  public function getRg(): string
  {
    return $this->rg;
  }

  public function setRg(string $rg): void
  {
    $this->rg = $rg;
  }

  public function getPassaporte(): string
  {
    return $this->passaporte;
  }

  public function setPassaporte(string $passaporte): void
  {
    $this->passaporte = $passaporte;
  }

  public function getDocumentoIdentificacao()
  {
    if ($this->rg == VAZIO) {
      return $this->getPassaporte();
    } else {
      return $this->getRg();
    }
  }

  public function setDocumentoIdentificacao(string $documentoIdentificacao)
  {
    // Vamos aceitar o rg so com numeros, tipo 11111111, oito digitos sem ponto ou hifen
    // O passaporte tem duas letras no começo, tipo AA11111.
    if (is_numeric($documentoIdentificacao)) {
      $this->setRg($documentoIdentificacao);
    } else {
      $this->setPassaporte($documentoIdentificacao);
    }
  }

  public function getCpf(): string
  {
    return $this->cpf;
  }

  public function setCpf(string $cpf): void
  {
    if ($this->validarCpf($cpf) == true) {
      $this->cpf = $cpf;
    } else {
      echo "CPF inválido!!!!";
    }
  }

  public function validarCpf(string $cpf)
  {
    // Extrai somente os números
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
      return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
      return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
      for ($d = 0, $c = 0; $c < $t; $c++) {
        $d += $cpf[$c] * (($t + 1) - $c);
      }
      $d = ((10 * $d) % 11) % 10;
      if ($cpf[$c] != $d) {
        return false;
      }
    }
    return true;
  }

  public function getNacionalidade(): string
  {
    return $this->nacionalidade;
  }

  public function setNacionalidade(string $nacionalidade): void
  {
    $this->nacionalidade = $nacionalidade;
  }

  public function getDataDeNascimento(): string
  {
    return $this->dataDeNascimento;
  }

  public function setDataDeNascimento(string $dataDeNascimento): void
  {
    if ($this->validarDataDeNascimento($dataDeNascimento) == true) {
      $this->dataDeNascimento = $dataDeNascimento;
    } else {
      echo "Data de nascimento inválida!!!!";
    }
  }

  public function validarDataDeNascimento(string $dataDeNascimento)
  {
    $data = explode('/', $dataDeNascimento);
    $d = $data[0];
    $m = $data[1];
    $y = $data[2];

    // verifica se a data é válida!
    // 1 = true (válida)
    // 0 = false (inválida)
    $res = checkdate($m, $d, $y);

    if ($res == 1) {
      return true;
    } else {
      return false;
    }
  }


  public function getEmail(): string
  {
    return $this->email;
  }

  public function setEmail(string $email): void
  {
    if ($this->validarEmail($email) == true) {
      $this->email = $email;
    } else {
      echo "Email inválido!!!!";
    }
  }

  public function validarEmail(string $email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      return true;
    } else {
      return false;
    }
  }

  public function getListaPassagens(): array
  {
    return $this->listaPassagens;
  }

  public function setListaPassagens(array $listaPassagens): void
  {
    $this->listaPassagens = $listaPassagens;
  }

  public function getHistoricoViagens(): array
  {
    return $this->historicoViagens;
  }

  public function setHistoricoViagens(array $historicoViagens): void
  {
    $this->historicoViagens = $historicoViagens;
  }

  static public function getFilename()
  {
    return get_called_class()::$local_filename;
  }
}
