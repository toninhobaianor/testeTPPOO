<?php
include_once("../libs/global.php");

class ProgramaMilhagem extends persist
{
    private string $nome;
    private array $listaCategorias;

    static $local_filename = "programasMilhagem.txt";


    public function __construct(string $nome, array $listaCategorias)
    {
        $this->setNome($nome);
        $this->setListaCategorias($listaCategorias);
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getListaCategorias(): array
    {
        return $this->listaCategorias;
    }

    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }

    public function setListaCategorias(array $listaCategorias)
    {
        $this->listaCategorias = $listaCategorias;
    }

    public function addListaCategorias(CategoriaProgramaMilhagem $novaCategoria)
    {
        array_push($this->listaCategorias, $novaCategoria);
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
