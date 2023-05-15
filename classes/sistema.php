<?php

include_once("../libs/global.php");

$sair = 0;

while ($sair == 0) {
    $opcMenu = 0;

    print_r("------ MENU SISTEMA ------\r\n");


    print_r("\n--- AEROPORTOS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Aeroportos\r\n");
    print_r(++$opcMenu . " - Editar Aeroportos\r\n");
    print_r(++$opcMenu . " - Adicionar uma Companhia Aerea a um Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas de um Aeroporto\r\n");
    print_r(++$opcMenu . " - Adicionar voos\r\n");
    print_r(++$opcMenu . " - Ver voos\r\n");
    print_r(++$opcMenu . " - Editar voos\r\n");

    print_r("\n--- COMPANHIAS AEREAS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas\r\n");
    print_r(++$opcMenu . " - Editar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Aeronaves da Comp Aerea\r\n");
    print_r(++$opcMenu . " - Criar viagem\r\n");
    print_r(++$opcMenu . " - Editar viagem\r\n");

    print_r("\n--- AERONAVES ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeronave\r\n");
    print_r(++$opcMenu . " - Ver Aeronaves\r\n");
    print_r(++$opcMenu . " - Editar Aeronave\r\n");

    print_r("\r\n-1 para sair do sistema\r\n");

    $opcao = (string)readline("Digite uma opcao: ");

    $opcMenu = 0;

    switch ($opcao) {

        case ++$opcMenu:
            print_r("Cadastramento de Aeroporto\r\n");
            print_r("\n\n");
            sis_cadastrarAeroporto();
            break;

        case ++$opcMenu:
            print_r("Ver aeroportos\r\n");
            print_r("\n\n");
            sis_verAeroportos();
            break;

        case ++$opcMenu:
            print_r("Editar Aeroporto\r\n");
            print_r("\n\n");
            sis_editarAeroporto();
            break;

        case ++$opcMenu:
            print_r("Conexao Comp. Aerea em Aeroporto\r\n");
            print_r("\n\n");
            sis_conectarCompanhiaAereaEmAeroporto();
            break;

        case ++$opcMenu:
            print_r("Ver Comp. Aerea em Aeroporto\r\n");
            print_r("\n\n");
            sis_verCompanhiasAereasEmAeroporto();
            break;
        case ++$opcMenu:
            print_r("Adicionar Voos\r\n");
            print_r("\n\n");
            AdicionarVoos();
            break;
        case ++$opcMenu:
            print_r("Ver voos\r\n");
            print_r("\n\n");
            verVoos();
            break;
        case ++$opcMenu:
            print_r("Editar Voos\r\n");
            print_r("\n\n");
            editarVoos();
            break;
        case ++$opcMenu:
            print_r("Cadastramento de Companhia Aerea\r\n");
            print_r("\n\n");
            sis_CadastrarCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Companhia Aerea\r\n");
            print_r("\n\n");
            sis_verCompanhiasAereas();
            break;

        case ++$opcMenu:
            print_r("Editar Companhia Aerea\r\n");
            print_r("\n\n");
            sis_editarCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Aeronaves da Comp Aerea\r\n");
            print_r("\n\n");
            sis_verAeronavesDaCompanhiaAerea();
            break;
        case ++$opcMenu:
            print_r("Criar viagem\r\n");
            print_r("\n\n");
            criaViagem();
            break;

        case ++$opcMenu:
            print_r("Altera viagem\r\n");
            print_r("\n\n");
            alteraViagem();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Aeronave\r\n");
            print_r("\n\n");
            sis_CadastrarAeronave();
            break;

        case ++$opcMenu:
            print_r("Ver Aeronaves\r\n");
            print_r("\n\n");
            sis_verAeronaves();
            break;

        case ++$opcMenu:
            print_r("Editar Aeronave\r\n");
            print_r("\n\n");
            sis_editarAeronave();
            break;

        case -1:
            print_r("Saindo do sistema...\r\n");
            $sair = 1;
            break;

        default:
            print_r("Opcao errada!!\r\n");
            print_r("\n\n");
            break;
    }
}

function sis_cadastrarAeroporto()
{
    $sigla = (string)readline("Digite a sigla do aeroporto: ");
    $cidade = (string)readline("Digite a cidade do aeroporto: ");
    $estado = (string)readline("Digite o estado do aeroporto: ");

    $aeroporto = new Aeroporto($sigla, $cidade, $estado);

    $aeroporto->save();

    print_r("Aeroporto cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeroportos()
{
    $aeroportos = Aeroporto::getRecords();

    // print_r($aeroportos);

    mostraAeroportos($aeroportos);

    print_r("\n\n");
}

function mostraAeroportos(array $aeroportos)
{
    print_r("Aeroportos cadastrados:\r\n");
    print_r("Index - Sigla - Cidade - Estado\r\n");

    foreach ($aeroportos as $aeroporto) {
        print_r($aeroporto->getIndex() . " - " . $aeroporto->getSigla() . " - " . $aeroporto->getCidade() . " - " . $aeroporto->getEstado() . "\r\n");
    }
}

function sis_editarAeroporto()
{
    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $index = (int)readline("Digite o index do aeroporto que deseja editar: ");

    $aeroporto = $aeroportos[$index - 1];

    $sigla = (string)readline("Digite a sigla do aeroporto: ");
    $cidade = (string)readline("Digite a cidade do aeroporto: ");
    $estado = (string)readline("Digite o estado do aeroporto: ");

    $aeroporto->setSigla($sigla);
    $aeroporto->setCidade($cidade);
    $aeroporto->setEstado($estado);

    $aeroporto->save();

    print_r("Aeroporto editado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_CadastrarCompanhiaAerea()
{
    $nome = (string)readline("Digite o nome da companhia aerea: ");
    $codigo = (string)readline("Digite o codigo da companhia aerea: ");
    $razaoSocial = (string)readline("Digite a razao social da companhia aerea: ");
    $cnpj = (string)readline("Digite o CNPJ da companhia aerea: ");
    $sigla = (string)readline("Digite a sigla da companhia aerea: ");

    $companhiaAerea = new CompanhiaAerea($nome, $codigo, $razaoSocial, $cnpj, $sigla);

    $companhiaAerea->save();

    print_r("Companhia Aerea cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verCompanhiasAereas()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    print_r("\n\n");
}

function mostraCompanhiasAereas(array $companhiasAereas)
{
    print_r("Companhias Aereas cadastradas:\r\n");
    print_r("Index - Nome - Codigo - Razao Social - CNPJ - Sigla\r\n");

    foreach ($companhiasAereas as $companhiaAerea) {
        print_r($companhiaAerea->getIndex() . " - " . $companhiaAerea->getNome() . " - " . $companhiaAerea->getCodigo() . " - " . $companhiaAerea->getRazaoSocial() . " - " . $companhiaAerea->getCnpj() . " - " . $companhiaAerea->getSigla() . "\r\n");
    }
}

function sis_editarCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $index = (int)readline("Digite o index da companhia aerea que deseja editar: ");

    $companhiaAerea = $companhiasAereas[$index - 1];

    $nome = (string)readline("Digite o nome da companhia aerea: ");
    $codigo = (string)readline("Digite o codigo da companhia aerea: ");
    $razaoSocial = (string)readline("Digite a razao social da companhia aerea: ");
    $cnpj = (string)readline("Digite o CNPJ da companhia aerea: ");
    $sigla = (string)readline("Digite a sigla da companhia aerea: ");

    $companhiaAerea->setNome($nome);
    $companhiaAerea->setCodigo($codigo);
    $companhiaAerea->setRazaoSocial($razaoSocial);
    $companhiaAerea->setCnpj($cnpj);
    $companhiaAerea->setSigla($sigla);

    $companhiaAerea->save();

    print_r("Companhia Aerea editada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_conectarCompanhiaAereaEmAeroporto()
{
    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea];

    $aeroporto->cadastraNovaCompanhiaAerea($indexCompanhiaAerea);

    $aeroporto->save();

    print_r("Conexao realizada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verCompanhiasAereasEmAeroporto()
{
    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    print_r("\n\n");

    $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    $indexCompanhiasAereas = $aeroporto->getCompanhiasAereas();

    // print_r("Companhias Aereas cadastradas no aeroporto:\r\n");
    // print_r($indexCompanhiasAereas);

    $companhiasAereasDoAeroporto = array();

    foreach ($indexCompanhiasAereas as $indexCompanhiaAerea) {
        $compAerea = CompanhiaAerea::getRecordsByField('index', $indexCompanhiaAerea);
        array_push($companhiasAereasDoAeroporto, $compAerea[0]);
    }

    mostraCompanhiasAereas($companhiasAereasDoAeroporto);

    print_r("\n\n");
}

function sis_CadastrarAeronave()
{
    $fabricante = (string)readline("Digite o fabricante da aeronave: ");
    $modelo = (string)readline("Digite o modelo da aeronave: ");
    $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
    $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");
    $registro = (string)readline("Digite o registro da aeronave: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence essa aeronave: ");

    $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $siglaCompAereaSelecionada = $companhiaAerea->getSigla();

    $aeronave = new Aeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $siglaCompAereaSelecionada);

    $aeronave->save();

    print_r("Aeronave cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronaves()
{
    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}

function mostraAeronaves(array $aeronaves)
{
    print_r("Aeronaves cadastradas:\r\n");
    print_r("Index - Fabricante - Modelo - Capacidade de Passageiros - Capacidade de Carga - Registro - Comp. Aerea\r\n");

    foreach ($aeronaves as $aeronave) {
        print_r($aeronave->getIndex() . " - " . $aeronave->getFabricante() . " - " . $aeronave->getModelo() . " - " . $aeronave->getCapacidadePassageiros() . " - " . $aeronave->getCapacidadeCarga() . " - " . $aeronave->getRegistro() . " - " . $aeronave->getCompAereaPertencente() . "\r\n");
    }
}

function sis_editarAeronave()
{
    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    $aeronave = $aeronaves[$indexAeronave - 1];

    $fabricante = (string)readline("Digite o fabricante da aeronave: ");
    $modelo = (string)readline("Digite o modelo da aeronave: ");
    $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
    $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");
    $registro = (string)readline("Digite o registro da aeronave: ");

    $aeronave->setFabricante($fabricante);
    $aeronave->setModelo($modelo);
    $aeronave->setCapacidadePassageiros($capacidadePassageiros);
    $aeronave->setCapacidadeCargaKg($capacidadeCarga);
    $aeronave->setRegistro($registro);

    $aeronave->save();

    print_r("Aeronave editada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronavesDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $siglaCompAereaSelecionada = $companhiaAerea->getSigla();

    // print_r("Sigla da Companhia Aerea selecionada: " . $siglaCompAereaSelecionada . "\r\n");

    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $siglaCompAereaSelecionada);

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}

function criaViagem(){

    /*private int $dia;
  private int $mes;
  private Voo $voo;
  private DateTime $horarioPartida;
  private DateTime $horarioChegada;
  private float $duracaoEstimada;
  private string $companhiaAerea;
  private Aeronave $aeronave;
  private float $carga;
  private float $valorvia;*/
  $dia = (int)readline("Dia em que ira acontecer: ");
  $mes = (int)readline("agora o mes: ");
  $duracao = (float)readline("qual e a duracao estimada: ");
  $compahiaArera = (string)readline("qual companhia ira realizar esta viagem: ");
  $carga = (float)readline("qual sera a carga que esta viagem levara: ");
  $valorviagem = (float)readline("qual sera o valor desta viagem: ");
    //não sei colocar o datetime ainda
    //precisamos saber de qual aeroporto vamos sair,para pegar qual voo vamos usar;
    //
}

/*function alteraViagem(){

}

function verVoos(){

}

function editarVoos(){

}

function editarVoos(){

    
}*/
