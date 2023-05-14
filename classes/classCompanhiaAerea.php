<?php
include_once("../libs/global.php");

class CompanhiaAerea extends persist
{
	private string $nome;
	private string $codigo;
	private string $razaoSocial;
	private string $cnpj;
	private string $sigla;

	private $listaDeViagens = array();
	private $listaDeViagensExecutadas = array();
	private $listaAeronaves = array();

	static $local_filename = "companhiasAereas.txt";

	// public function __construct(string $nome, string $codigo, string $razaoSocial, string $cnpj, string $sigla, array $listaDeViagens, array $listaDeViagensExecutadas, array $listaAeronaves)
	public function __construct(string $nome, string $codigo, string $razaoSocial, string $cnpj, string $sigla)
	{
		$this->setNome($nome);
		$this->setCodigo($codigo);
		$this->setRazaoSocial($razaoSocial);
		$this->setCnpj($cnpj);
		$this->setSigla($sigla);


		// $this->listaDeViagens = $listaDeViagens;
		// $this->listaDeViagensExecutadas = $listaDeViagensExecutadas;
		// $this->$listaAeronaves = $listaAeronaves;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function getRazaoSocial()
	{
		return $this->razaoSocial;
	}

	public function getCnpj()
	{
		return $this->cnpj;
	}

	public function getSigla()
	{
		return $this->sigla;
	}

	public function setNome(string $nome)
	{
		$this->nome = $nome;
	}

	public function setCodigo(string $codigo)
	{
		$this->codigo = $codigo;
	}

	public function setRazaoSocial(string $razaoSocial)
	{
		$this->razaoSocial = $razaoSocial;
	}

	public function setCnpj(string $cnpj)
	{
		$this->cnpj = $cnpj;
	}

	public function setSigla(string $sigla)
	{
		$this->sigla = $sigla;
	}

	public function exibirCompanhia()
	{
		print_r($this->nome);
		echo "\n";
		print_r($this->codigo);
		echo "\n";
		print_r($this->razaoSocial);
		echo "\n";
		print_r($this->cnpj);
		echo "\n";
		print_r($this->sigla);
	}

	public function executaViagem(Viagem $novaViagem)
	{
	}

	public function cadastrarNovaAeronave(Aeronave $novaAeronave)
	{
		array_push($this->listaAeronaves, $novaAeronave);
	}

	public function cadastrarViagem()
	{
	}

	// public function vendaPassagem(Cliente cliente)
	// {
	// }

	public function cadastrarCliente()
	{
	}

	public function cadastrarPassageiro()
	{
	}

	public function validaViagem()
	{
	}

	public function exibirListaAeronaves()
	{
		print_r($this->listaAeronaves);
	}

	static public function getFilename()
	{
		return get_called_class()::$local_filename;
	}
}
