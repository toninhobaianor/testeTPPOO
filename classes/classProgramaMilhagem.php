<?php
include_once("../libs/global.php");

class ProgramaMilhagem extends persist
{
    private string $nome;
    private ?array $listaCategorias;

    protected ?int $compAereaPertentencente;

    static $local_filename = "programasMilhagem.txt";


    // public function __construct(string $nome, ?array $listaCategorias)
    public function __construct(string $nome, ?int $compAereaPertentencente)
    {
        $this->setNome($nome);
        $this->setCompAereaPertentencente($compAereaPertentencente);
        // $this->setListaCategorias($listaCategorias);

        $this->listaCategorias = array();
    }

    public function alterarProgramaMilhagem(ProgramaMilhagem $novoProgramaMilhagem)
    {
        $this->setNome($novoProgramaMilhagem->getNome());
        $this->setCompAereaPertentencente($novoProgramaMilhagem->getCompAereaPertentencente());
        $this->setListaCategorias($novoProgramaMilhagem->getListaCategorias());
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getListaCategorias(): array
    {
        return $this->listaCategorias;
    }

    public function getCompAereaPertentencente(): ?int
    {
        return $this->compAereaPertentencente;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setListaCategorias(?array $listaCategorias)
    {
        $this->listaCategorias = $listaCategorias;
    }

    public function setCompAereaPertentencente(?int $compAereaPertentencente)
    {
        $this->compAereaPertentencente = $compAereaPertentencente;
    }

    public function addCategoria(CategoriaProgramaMilhagem $novaCategoria)
    {
        array_push($this->listaCategorias, $novaCategoria);
    }

    public function editarCategoria(int $index, CategoriaProgramaMilhagem $novaCategoria)
    {
        $this->listaCategorias[$index] = $novaCategoria;
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
