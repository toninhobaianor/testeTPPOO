<?php
include_once("../libs/global.php");

class PassageiroVip extends Passageiro
{
  private string $NumeroRegistroProgramaMilhagem;
  private int $ProgramaMilhagemFavorito;
  private array $listaPontosMilhagem;
  private int $pontosMilhasTotais;

  public function __construct()
  {
    $listaPontosMilhagem = array();
  }

  public function setNumeroRegistroProgramaMilhagem(string $NumeroRegistroProgramaMilhagem)
  {
    $this->NumeroRegistroProgramaMilhagem = $NumeroRegistroProgramaMilhagem;
  }

  public function getNumeroRegistroProgramaMilhagem(): string
  {
    return $this->NumeroRegistroProgramaMilhagem;
  }

  public function setProgramaMilhagemFavorito(int $ProgramaMilhagemFavorito)
  {
    $this->ProgramaMilhagemFavorito = $ProgramaMilhagemFavorito;
  }

  public function getProgramaMilhagemFavorito(): int
  {
    return $this->ProgramaMilhagemFavorito;
  }

  public function addPontosMilhagem(PontoMilha $pontos)
  {
    array_push($this->listaPontosMilhagem, $pontos);
  }

  public function getListaPontosMilhagem(): array
  {
    return $this->listaPontosMilhagem;
  }

  public function getListaPontosMilhagemValidos()
  {
    // por enquanto, retorna todos os pontos
    // mas faremos o filtro por data de validade
    return $this->listaPontosMilhagem;
  }

  public function getPontosMilhasTotais(): int
  {
    return $this->pontosMilhasTotais;
  }

  public function setPontosMilhasTotais(int $pontosMilhasTotais)
  {
    $this->pontosMilhasTotais = $pontosMilhasTotais;
  }

  public function addPontosMilhasTotais(int $novosPontos)
  {
    $this->pontosMilhasTotais += $novosPontos;
  }
}
