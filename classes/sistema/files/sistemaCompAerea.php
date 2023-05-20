<?php

include_once("../libs/global.php");

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

    if (count($companhiasAereas) == 0) {
        print_r("Nenhuma companhia aerea cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

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

    $novaCompanhiaAerea = new CompanhiaAerea($nome, $codigo, $razaoSocial, $cnpj, $sigla);

    $companhiaAerea->alterarCompanhiaAerea($novaCompanhiaAerea);

    $companhiaAerea->save();

    print_r("Companhia Aerea editada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_conectarAeronaveEmCompanhiaAerea()
{
    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', SEM_COMPANHIA_AEREA_DEFINIDA);

    // print_r("Aeronaves sem companhia aerea:\r\n");
    // print_r($aeronaves);

    if (count($aeronaves) == 0) {
        print_r("Nao ha aeronaves sem companhia aerea!\r\n");
        return;
    }

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    if (count($companhiasAereas) == 0) {
        print_r("Nao ha companhias aereas cadastradas!\r\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    foreach ($aeronaves as $aeronave) {
        if ($aeronave->getIndex() == $indexAeronave) {
            $aeronave->setCompAereaPertencente($indexCompanhiaAerea);

            $aeronave->save();

            break;
        }
    }

    print_r("Aeronave conectada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronavesDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

    if (count($aeronaves) == 0) {
        print_r("Nao ha aeronaves nessa companhia aerea!\r\n");
        return;
    }

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}

function sis_conectarVeiculoEmCompanhiaAerea()
{
    $veiculos = Veiculo::getRecordsByField('compAereaPertencente', SEM_COMPANHIA_AEREA_DEFINIDA);

    // print_r("Aeronaves sem companhia aerea:\r\n");
    // print_r($aeronaves);

    if (count($veiculos) == 0) {
        print_r("Nao ha veiculos sem companhia aerea!\r\n");
        return;
    }

    mostraVeiculos($veiculos);

    $indexVeiculo = (int)readline("Digite o index do veiculos: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    if (count($companhiasAereas) == 0) {
        print_r("Nao ha companhias aereas cadastradas!\r\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    foreach ($veiculos as $veiculo) {
        if ($veiculo->getIndex() == $indexVeiculo) {
            $veiculo->setCompAereaPertencente($indexCompanhiaAerea);

            $veiculo->save();

            break;
        }
    }

    print_r("Veiculo conectado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verVeiculosDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $veiculos = Veiculo::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

    if (count($veiculos) == 0) {
        print_r("Nao ha veiculos nessa companhia aerea!\r\n");
        return;
    }

    mostraVeiculos($veiculos);

    print_r("\n\n");
}

function sis_verPilotosDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $pilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    if (count($pilotos) == 0) {
        print_r("Nao ha pilotos nessa companhia aerea!\r\n");
        return;
    }

    mostraPilotos($pilotos);

    print_r("\n\n");
}

function sis_verComissariosDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $comissarios = Comissario::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    if (count($comissarios) == 0) {
        print_r("Nao ha comissarios nessa companhia aerea!\r\n");
        return;
    }

    mostraComissarios($comissarios);

    print_r("\n\n");
}
