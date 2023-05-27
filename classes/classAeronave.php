<?php
include_once("../libs/global.php");

// define("TAMANHO_REGISTRO", 6);
// define("SEM_COMPANHIA_AEREA", -1);

class Aeronave extends persist
{
	private string $fabricante;
	private string $modelo;
	private int $capacidadePassageiros;
	private float $capacidadeCargaKg;
	private string $registro;
	private bool $disponivel;

	protected ?int $compAereaPertencente; // protected para acessar na busca pelo index

	private array $listaAssentos;

	static $local_filename = "aeronaves.txt";

	public function __construct(string $fabricante, string $modelo, int $capacidadePassageiros, float $capacidadeCarga, string $registro)
	{

		$this->setRegistro($registro);
		$this->setFabricante($fabricante);
		$this->setModelo($modelo);
		$this->setCapacidadePassageiros($capacidadePassageiros);
		$this->setCapacidadeCargaKg($capacidadeCarga);

		//Deixa a aeronave disponível por padrão
		$this->setDisponibilidadeAeronave(true);

		// Prepara a todos os assentos($listaAssentos) com 0 (assento vazio)
		$this->preecheListaAssentos();

		// sempre cadastramos uma nova Aeronave com -1, pois ela não pertence a nenhuma companhia aérea ainda
		// quando definimos a companhia aérea, alteramos esse valor
		$this->setCompAereaPertencente(SEM_COMPANHIA_AEREA_DEFINIDA);
	}

	static public function criarAeronave(string $fabricante, string $modelo, int $capacidadePassageiros, float $capacidadeCarga, string $registro, ?int $indexCompAerea)
	{
		$validaRegistro = self::validaRegistro($registro);

		if ($validaRegistro == 1) {
			$aeronave = new Aeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro);

			$aeronave->setCompAereaPertencente($indexCompAerea);

			return $aeronave;
		} else {
			print_r("Erro ao criar aeronave: " . $validaRegistro . "\n");
			return NULL;
		}
	}

	public function alteraAeronave(Aeronave $novaAeronave)
	{
		$this->setFabricante($novaAeronave->getFabricante());
		$this->setModelo($novaAeronave->getModelo());
		$this->setCapacidadePassageiros($novaAeronave->getCapacidadePassageiros());
		$this->setCapacidadeCargaKg($novaAeronave->getCapacidadeCarga());
		$this->setCompAereaPertencente($novaAeronave->getCompAereaPertencente());
		$this->setRegistro($novaAeronave->getRegistro());

		// nao precisamos alterar a disponibilidade da aeronave desse jeito
		// $this->setDisponibilidadeAeronave($novaAeronave->getDisponibilidadeAeronave());

	}

	public function getFabricante()
	{
		return $this->fabricante;
	}

	public function setFabricante(string $fabricante)
	{
		$this->fabricante = $fabricante;
	}

	public function getModelo()
	{
		return $this->modelo;
	}

	public function setModelo(string $modelo)
	{
		$this->modelo = $modelo;
	}

	public function getCapacidadePassageiros()
	{
		return $this->capacidadePassageiros;
	}

	public function setCapacidadePassageiros(int $capacidadePassageiros)
	{
		$this->capacidadePassageiros = $capacidadePassageiros;
	}

	public function getCapacidadeCarga()
	{
		return $this->capacidadeCargaKg;
	}

	public function setCapacidadeCargaKg(float $capacidadeCargaKg)
	{
		$this->capacidadeCargaKg = $capacidadeCargaKg;
	}

	public function getRegistro()
	{
		return $this->registro;
	}

	public function setRegistro(string $registro)
	{
		$registro = strtoupper($registro);
		$this->registro = $registro;
	}

	static public function validaRegistro(string $registro)
	{

		// Coloca tudo maiusculo
		$registro = strtoupper($registro);

		// Verifica o tamanho da string
		if (strlen($registro) != TAMANHO_REGISTRO) {
			return "Tamanho do registro errado \r\n";
		};

		// Verifica a primeira letra
		if (($registro[0] != 'P')) {
			return "Registro nao comeca com 'P' \r\n";
		};

		// Verifica a segunda letra
		if (
			$registro[1] != 'T' and
			$registro[1] != 'R' and
			$registro[1] != 'P' and
			$registro[1] != 'S'
		) {
			return "Segunda letra do registro nao e 'T', 'P', 'P' ou 'S' \r\n";
		}

		// Verifica a posicao do hifen	
		if ($registro[2] != '-') {
			return "O hifen nao esta na posicao correta \r\n";
		}

		// Verifica se os tres ultimos chars nao sao numericos
		if (is_numeric($registro[3]) or is_numeric($registro[4]) or is_numeric($registro[5])) {
			return "Os tres ultimos digitos nao sao numericos \r\n";
		}

		// Retorna true se der tudo certo
		return 1;
	}

	public function setDisponibilidadeAeronave(bool $disponibilidade)
	{
		if ($disponibilidade == true) {
			$this->setAeronaveDisponivel();
		} else {
			$this->setAeronaveIndisponivel();
		}
	}

	public function getDisponibilidadeAeronave()
	{
		return $this->disponivel;
	}

	public function setAeronaveDisponivel()
	{
		$this->disponivel = true;
	}

	public function setAeronaveIndisponivel()
	{
		$this->disponivel = false;
	}

	public function getCompAereaPertencente()
	{
		return $this->compAereaPertencente;
	}

	public function setCompAereaPertencente(?int $compAereaPertencente)
	{
		$this->compAereaPertencente = $compAereaPertencente;
	}

	public function getListaAssentos()
	{
		return $this->listaAssentos;
	}

	public function preecheListaAssentos()
	{
		$listaAssentos = array();

		for ($i = 1; $i <= $this->getCapacidadePassageiros(); $i++) {
			$listaAssentos[$i] = 0;
		}

		$this->listaAssentos = $listaAssentos;

		// print_r($this->listaAssentos);
	}

	static public function getFilename()
	{
		return get_called_class()::$local_filename;
	}
}
