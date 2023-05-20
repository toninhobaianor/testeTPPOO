<?php

include_once("../libs/global.php");

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

    if (count($aeroportos) == 0) {
        print_r("Nenhum aeroporto cadastrado!\r\n");
        print_r("\n\n");
        return;
    }

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

    $novoAeroporto = new Aeroporto($sigla, $cidade, $estado);

    $aeroporto->alterarAeroporto($novoAeroporto);

    $aeroporto->save();

    print_r("Aeroporto editado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_conectarCompanhiaAereaEmAeroporto()
{

    $companhiasAereas = CompanhiaAerea::getRecords();

    if (count($companhiasAereas) == 0) {
        print_r("Nenhuma companhia aerea cadastrada!\r\n");
        // print_r("Cadastre uma companhia aerea antes de conectar com um aeroporto!\r\n");
        // print_r("\n\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $aeroportos = Aeroporto::getRecords();

    if (count($aeroportos) == 0) {
        print_r("Nenhum aeroporto cadastrado!\r\n");
        // print_r("Cadastre um aeroporto antes de conectar com uma companhia aerea!\r\n");
        // print_r("\n\n");
        return;
    }

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

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

    $listaDeIndexDasCompanihasAereasDoAeroporto = $aeroporto->getListaCompanhiasAereas();

    // print_r("Companhias Aereas cadastradas no aeroporto:\r\n");
    // print_r($indexCompanhiasAereas);

    $companhiasAereasDoAeroporto = array();

    foreach ($listaDeIndexDasCompanihasAereasDoAeroporto as $indexCompanhiaAerea) {
        $compAerea = CompanhiaAerea::getRecordsByField('index', $indexCompanhiaAerea);
        array_push($companhiasAereasDoAeroporto, $compAerea[0]);
    }

    if (count($companhiasAereasDoAeroporto) == 0) {
        print_r("Nenhuma companhia aerea cadastrada no aeroporto!\r\n");
        print_r("\n\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereasDoAeroporto);

    print_r("\n\n");
}

function sis_verVoosEmAeroporto()
{
    // print_r("Em desenvolvimento!\r\n");
    $aeroportos = Aeroporto::getRecords();

    if (count($aeroportos) == 0) {
        print_r("Nenhum aeroporto cadastrado!\r\n");
        print_r("\n\n");
        return;
    }

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    print_r("\n\n");

    $aeroporto = $aeroportos[$indexAeroporto - 1]->getIndex();

    $voos = Voo::getRecordsByField('aeroportoOrigem', $aeroporto);

    if (count($voos) == 0) {
        print_r("Nenhum voo cadastrado no aeroporto!\r\n");
        print_r("\n\n");
        return;
    }

    mostraVoos($voos);

    print_r("\n\n");
}
