<?php

include_once("../libs/global.php");
include_once("sistemaViagem.php");
include_once("sistemaVoo.php");
include_once("sistemaPassageiro.php");
include_once("sistemaCliente.php");

function criar_Passagem(){
    $clientes = Cliente::getRecords();
    mostra_Clientes($clientes);
    $indexcliente = (int)readline("Digite o index do cliente: ");
    $cliente = $clientes[$indexcliente - 1];

    $passageiros = Passageiro::getRecords();
    mostra_Passageiros($passageiros);
    $indexpassa = (int)readline("Digite o index do passageiro: ");
    $passageiro = $passageiros[$indexpassa - 1];

    $viagens = Viagem::getRecords();
    mostra_Viagem($viagens);
    $indexviagem = (int)readline("Digite o index da viagem: ");
    $viagem = $viagens[$indexviagem - 1];

    $voos = Voo::getRecords();
    $voo = $voos[$viagem->getVoo() - 1];

    $franquiasBagagem = (int)readline("quantas franquias vc quer(limite 3): ");
    $assento = (string)readline("digite um assento(letra numero): ");

    $passagem = new Passagem($voo->getAeroportoOrigem(),$voo->getAeroportoDestino(),$viagem->getvalorViagem(),$assento,$franquiasBagagem,$passageiro,$cliente,$viagem);

    $passagem->save();

}

function mostrar_Passagens(array $passagens){
    print_r("Passagens cadastradas:\r\n");
    print_r("Index - nome do passageiro - Aeroporto Origem - Aeroporto Destino - nome do cliente - status - preco\r\n");

    foreach($passagens as $passagem){
        $pass = $passagem->getPassageiro();
        $clie = $passagem->getCliente();

        print_r($passagem->getIndex() . "-" . $pass->getNome() . "-" . $passagem->getSiglaAeroportoOrigem() . "-" . $passagem->getSiglaAeroportoDestino() . "-" . $clie->getNome() . "-" . $passagem->getStatus() . "-" . $passagem->getPreco() . $passagem->getViagem() . "\r\n");
    }

}

function ver_passagens(){
    $passagens = Passagem::getRecords();

    if (count($passagens) == 0) {
        print_r("Nenhuma passagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostrar_Passagens($passagens);

    print_r("\n\n");

}

function editar_Passagem(){
    $passagens = Passagem::getRecords();

    if (count($passagens) == 0) {
        print_r("Nenhuma passagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostrar_Passagens($passagens);

    $index = (int)readline("Digite o index da Passagem: ");

    $passagem = $passagens[$index - 1];

    $clientes = Cliente::getRecords();
    mostra_Cliente($clientes);
    $indexcliente = (int)readline("Digite o index do voo: ");
    $cliente = $clientes[$indexcliente - 1];

    $passageiros = Passageiro::getRecords();
    mostra_Passageiros($passageiros);
    $indexpassa = (int)readline("Digite o index do voo: ");
    $passageiro = $passageiros[$indexpassa - 1];

    $viagens = Viagem::getRecords();
    mostra_Viagem($viagens);
    $indexviagem = (int)readline("Digite o index do voo: ");
    $viagem = $viagens[$indexviagem - 1];

    $voos = Voo::getRecords();
    $voo = $voos[$viagem->getVoo() - 1];

    $franquiasBagagem = (int)readline("quantas franquias vc quer(limite 3): ");
    $assento = (string)readline("digite um assento(letra numero): ");

    $passagemnovo = new Passagem($voo->getAeroportoOrigem(),$voo->getAeroportoDestino(),$viagem->getvalor(),$assento,$franquiasBagagem,$passageiro,$cliente,$viagem);

    $passagem->alterarPassagem($passagemnovo);
    
    $passagem->save();


}
