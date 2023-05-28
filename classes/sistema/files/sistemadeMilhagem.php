<?php

include_once("../libs/global.php");

function sis_cadastrarProgramaDeMilhagem()
{
    $nome = readline("Digite o nome do programa de milhagem: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a que ele pertence: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    $programaDeMilhagem = new ProgramaMilhagem($nome, $indexCompanhiaAerea);

    $programaDeMilhagem->save();

    print_r("Programa de milhagem cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verProgramasDeMilhagem()
{
    $programasDeMilhagem = ProgramaMilhagem::getRecords();

    if (count($programasDeMilhagem) == 0) {
        print_r("Nao ha programas de milhagem cadastrados!\r\n");
        return;
    }

    mostraProgramasDeMilhagem($programasDeMilhagem);

    print_r("\n\n");
}

function mostraProgramasDeMilhagem(array $programasDeMilhagem)
{
    print_r("Programas de milhagem:\r\n");
    print_r("Index - Nome - Comp Aerea Pertencente\r\n");

    foreach ($programasDeMilhagem as $programaDeMilhagem) {

        $compAereaProgramaMilhagem = "";

        if ($programaDeMilhagem->getCompAereaPertentencente() == null)
            $compAereaProgramaMilhagem = "null";
        else {
            $compAereaProgramaMilhagem = $programaDeMilhagem->getCompAereaPertentencente();
        }


        print_r($programaDeMilhagem->getIndex() . " - " . $programaDeMilhagem->getNome() . " - " . $compAereaProgramaMilhagem . "\r\n");
    }
}

function sis_editarProgramaDeMilhagem()
{
    $programasDeMilhagem = ProgramaMilhagem::getRecords();

    if (count($programasDeMilhagem) == 0) {
        print_r("Nao ha programas de milhagem cadastrados!\r\n");
        return;
    }

    mostraProgramasDeMilhagem($programasDeMilhagem);

    $indexProgramaDeMilhagem = (int)readline("Digite o index do programa de milhagem: ");

    $programaDeMilhagem = $programasDeMilhagem[$indexProgramaDeMilhagem - 1];

    $nome = readline("Digite o nome do programa de milhagem: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a que ele pertence: ");

    $novoProgramaMilhagem = new ProgramaMilhagem($nome, $indexCompanhiaAerea);

    $programaDeMilhagem->alterarProgramaMilhagem($novoProgramaMilhagem);

    $programaDeMilhagem->save();

    print_r("Programa de milhagem editado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verProgramaDeMilhagemDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    if (count($companhiasAereas) == 0) {
        print_r("Nao ha companhias aereas cadastradas!\r\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $programasDeMilhagem = ProgramaMilhagem::getRecordsByField('compAereaPertentencente', $indexCompanhiaAerea);

    if (count($programasDeMilhagem) == 0) {
        print_r("Nao ha programas de milhagem nessa companhia aerea!\r\n");
        return;
    }

    mostraProgramasDeMilhagem($programasDeMilhagem);

    print_r("\n\n");
}

function sis_cadastrarCategoriaNoProgramaDeMilhagem()
{
    $programasDeMilhagem = ProgramaMilhagem::getRecords();

    if (count($programasDeMilhagem) == 0) {
        print_r("Nao ha programas de milhagem cadastrados!\r\n");
        return;
    }

    mostraProgramasDeMilhagem($programasDeMilhagem);

    $indexProgramaDeMilhagem = (int)readline("Digite o index do programa de milhagem: ");

    $programaDeMilhagem = $programasDeMilhagem[$indexProgramaDeMilhagem - 1];

    $nome = readline("Digite o nome da categoria: ");

    $pontos = (int)readline("Digite a quantidade de pontos: ");

    $categoria = new CategoriaProgramaMilhagem($nome, $pontos);

    $programaDeMilhagem->addCategoria($categoria);

    $programaDeMilhagem->save();

    print_r("Categoria cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verCategoriasNoProgramaDeMilhagem()
{
    $programasDeMilhagem = ProgramaMilhagem::getRecords();

    if (count($programasDeMilhagem) == 0) {
        print_r("Nao ha programas de milhagem cadastrados!\r\n");
        return;
    }

    mostraProgramasDeMilhagem($programasDeMilhagem);

    $indexProgramaDeMilhagem = (int)readline("Digite o index do programa de milhagem: ");

    $programaDeMilhagem = $programasDeMilhagem[$indexProgramaDeMilhagem - 1];

    $categorias = $programaDeMilhagem->getListaCategorias();

    if (count($categorias) == 0) {
        print_r("Nao ha categorias cadastradas nesse programa de milhagem!\r\n");
        return;
    }

    mostraCategoriasProgramaMilhagem($categorias);

    print_r("\n\n");
}

function mostraCategoriasProgramaMilhagem(array $categorias)
{
    print_r("Index - Nome - Pontos\r\n");

    $i = 0;

    foreach ($categorias as $categoria) {
        $i++;
        print_r($i . " - " . $categoria->getNome() . " - " . $categoria->getValor() . "\r\n");
    }
}

function sis_editarCategoriaNoProgramaDeMilhagem()
{
    $programasDeMilhagem = ProgramaMilhagem::getRecords();

    if (count($programasDeMilhagem) == 0) {
        print_r("Nao ha programas de milhagem cadastrados!\r\n");
        return;
    }

    mostraProgramasDeMilhagem($programasDeMilhagem);

    $indexProgramaDeMilhagem = (int)readline("Digite o index do programa de milhagem: ");

    $programaDeMilhagem = $programasDeMilhagem[$indexProgramaDeMilhagem - 1];

    $categorias = $programaDeMilhagem->getListaCategorias();

    if (count($categorias) == 0) {
        print_r("Nao ha categorias cadastradas nesse programa de milhagem!\r\n");
        return;
    }

    mostraCategoriasProgramaMilhagem($categorias);

    $indexCategoria = (int)readline("Digite o index da categoria: ");


    // $categoria = $categorias[$indexCategoria - 1];

    $nome = readline("Digite o novo nome da categoria: ");

    $pontos = (int)readline("Digite a quantidade de pontos: ");


    $novaCategoria = new CategoriaProgramaMilhagem($nome, $pontos);

    $programaDeMilhagem->editarCategoria($indexCategoria, $novaCategoria);


    $programaDeMilhagem->save();

    // $novaCategoria = new CategoriaProgramaMilhagem($nome, $pontos);

    // $categoria->alterarCategoriaProgramaMilhagem($novaCategoria);

    // $categoria->save();

    print_r("Categoria editada com sucesso!\r\n");

    print_r("\n\n");
}