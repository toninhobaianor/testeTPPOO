<?php
include_once("../libs/global.php");

class Tripulantes extends persist
{
    private string $tipoTripulante;
    private string $nome;
    private string $sobrenome;
    private string $rg;
    private string $passaporte;
    private string $documentoIdentificacao;
    private string $cpf;
    private string $nacionalidade;
    private string $dataNascimento;
    private string $email;
    private string $cht;
    private string $endRua;
    private string $endNumero;
    private string $endComplemento;
    private string $endCep;
    private string $endCidade;
    private string $endEstado;
    private int $companhiaAerea;
    private int $aeroportoBase;

    static $local_filename = "tripulantes.txt";


    public function __construct(string $tipoTripulante, string $nome, string $sobrenome, string $documentoIdentificacao, string $cpf, string $nacionalidade, string $dataNascimento, string $email, string $cht, string $endRua, string $endNumero, string $endComplemento, string $endCep, string $endCidade, string $endEstado, int $companhiaAerea, int $aeroportoBase)
    {
        $this->setTipoTripulante($tipoTripulante);
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setDocumentoIdentificacao($documentoIdentificacao);
        $this->setCpf($cpf);
        $this->setNacionalidade($nacionalidade);
        $this->setDataNascimento($dataNascimento);
        $this->setEmail($email);
        $this->setCht($cht);
        $this->setEndRua($endRua);
        $this->setEndNumero($endNumero);
        $this->setEndComplemento($endComplemento);
        $this->setEndCep($endCep);
        $this->setEndCidade($endCidade);
        $this->setEndEstado($endEstado);
        $this->setCompanhiaAerea($companhiaAerea);
        $this->setAeroportoBase($aeroportoBase);
    }

    public function getTipoTripulante(): int
    {
        return $this->tipoTripulante;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getDocumentoIdentificacao()
    {
        if ($this->rg == VAZIO) {
            return $this->getPassaporte();
        } else {
            return $this->getRg();
        }
    }

    public function getRg()
    {
        return $this->rg;
    }

    public function getPassaporte()
    {
        return $this->passaporte;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getNacionalidade(): string
    {
        return $this->nacionalidade;
    }

    public function getDataNascimento(): string
    {
        return $this->dataNascimento;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCht(): string
    {
        return $this->cht;
    }

    public function getEndRua(): string
    {
        return $this->endRua;
    }

    public function getEndNumero(): string
    {
        return $this->endNumero;
    }

    public function getEndComplemento(): string
    {
        return $this->endComplemento;
    }

    public function getEndCep(): string
    {
        return $this->endCep;
    }

    public function getEndCidade(): string
    {
        return $this->endCidade;
    }

    public function getEndEstado(): string
    {
        return $this->endEstado;
    }

    public function getCompanhiaAerea(): int
    {
        return $this->companhiaAerea;
    }

    public function getAeroportoBase(): int
    {
        return $this->aeroportoBase;
    }

    public function setTipoTripulante(string $tipoTripulante)
    {
        $this->tipoTripulante = $tipoTripulante;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setSobrenome(string $sobrenome)
    {
        $this->sobrenome = $sobrenome;
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

    public function setRg(string $rg)
    {
        $this->rg = $rg;
    }

    public function setPassaporte(string $passaporte)
    {
        $this->passaporte = $passaporte;
    }

    public function setCpf(string $cpf)
    {
        $this->cpf = $cpf;
    }

    public function setNacionalidade(string $nacionalidade)
    {
        $this->nacionalidade = $nacionalidade;
    }

    public function setDataNascimento(string $dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function setCht(string $cht)
    {
        $this->cht = $cht;
    }

    public function setEndRua(string $endRua)
    {
        $this->endRua = $endRua;
    }

    public function setEndNumero(string $endNumero)
    {
        $this->endNumero = $endNumero;
    }

    public function setEndComplemento(string $endComplemento)
    {
        $this->endComplemento = $endComplemento;
    }

    public function setEndCep(string $endCep)
    {
        $this->endCep = $endCep;
    }

    public function setEndCidade(string $endCidade)
    {
        $this->endCidade = $endCidade;
    }

    public function setEndEstado(string $endEstado)
    {
        $this->endEstado = $endEstado;
    }

    public function setCompanhiaAerea(int $companhiaAerea)
    {
        $this->companhiaAerea = $companhiaAerea;
    }

    public function setAeroportoBase(int $aeroportoBase)
    {
        $this->aeroportoBase = $aeroportoBase;
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
