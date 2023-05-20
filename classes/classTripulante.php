<?php
include_once("../libs/global.php");

// define('VAZIO', '');

// define("PILOTO", 1);
// define("COMISSARIO", 2);

class Tripulante extends persist
{
    private int $tipoTripulante; // Piloto - 1, Comissario - 2
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
    private Endereco $endereco;
    protected ?int $companhiaAerea;
    private ?int $aeroportoBase;

    static $local_filename = "tripulantes.txt"; // nao usamos esse arquivo, criamos um txt para cada filho de Tripulante

    public function __construct(string $nome, string $sobrenome, string $documentoIdentificacao, string $cpf, string $nacionalidade, string $dataNascimento, string $email, string $cht, Endereco $endereco, ?int $companhiaAerea, ?int $aeroportoBase)
    {
        // $this->setTipoTripulante($tipoTripulante);
        $this->setNome($nome);
        $this->setSobrenome($sobrenome);
        $this->setDocumentoIdentificacao($documentoIdentificacao);
        $this->setCpf($cpf);
        $this->setNacionalidade($nacionalidade);
        $this->setDataNascimento($dataNascimento);
        $this->setEmail($email);
        $this->setCht($cht);
        $this->setEndereco($endereco);
        $this->setCompanhiaAerea($companhiaAerea);
        $this->setAeroportoBase($aeroportoBase);
    }

    public function alterarTripulante(Tripulante $novoTripulante)
    {
        $this->setTipoTripulante($novoTripulante->getTipoTripulante());
        $this->setNome($novoTripulante->getNome());
        $this->setSobrenome($novoTripulante->getSobrenome());
        $this->setDocumentoIdentificacao($novoTripulante->getDocumentoIdentificacao());
        $this->setCpf($novoTripulante->getCpf());
        $this->setNacionalidade($novoTripulante->getNacionalidade());
        $this->setDataNascimento($novoTripulante->getDataNascimento());
        $this->setEmail($novoTripulante->getEmail());
        $this->setCht($novoTripulante->getCht());
        $this->setEndereco($novoTripulante->getEndereco());
        $this->setCompanhiaAerea($novoTripulante->getCompanhiaAerea());
        $this->setAeroportoBase($novoTripulante->getAeroportoBase());
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

    public function getEndereco()
    {
        return $this->endereco;
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

    public function setEndereco(Endereco $endereco)
    {
        $this->endereco = $endereco;
    }

    public function setCompanhiaAerea(?int $companhiaAerea)
    {
        $this->companhiaAerea = $companhiaAerea;
    }

    public function setAeroportoBase(?int $aeroportoBase)
    {
        $this->aeroportoBase = $aeroportoBase;
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
