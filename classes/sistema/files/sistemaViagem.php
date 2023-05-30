<?php

include_once("../libs/global.php");
include_once("sistemaVoo.php");
include_once("sistemaPassageiro.php");
include_once("sistemaPassagem.php");

function cadastra_Viagem(){

    $voos = Voo::getRecords();
    mostraVoos($voos);
    $index = (int)readline("Digite o index do voo: ");

    $voo = $voos[$index - 1];

    $horarioPartida = $voo->getPrevisaoPartida();
    $horarioChegada = $voo->getPrevisaoChegada();

    $carga = (float)readline("digite o valor da carga: ");
    $milhasViagem = (int)readline("digite o valor das milhas: ");
    $valorViagem = (float)readline("digite o valor da viagem: ");
    $valorFranquiaBagagem = (float)readline("digite o valor da franquia:");

    $codigoViagem = (string)readline("digite um codigo para a viagem: ");

    $viagem = new Viagem($horarioPartida,$horarioChegada,$carga,$index,$milhasViagem,$valorViagem,$valorFranquiaBagagem,$codigoViagem);

    $viagem->save();
}

function mostra_Viagem(array $viagens){
    print_r("Viagens cadastradas:\r\n");
    print_r("Index -  Aeroporto Origem - Aeroporto Destino - Comp Aerea - Horario Partida - Horario Chegada - Valor da Viagem - Valor da franquia\r\n");
    $voos = Voo::getRecords();
    foreach($viagens as $viagem){
        $voo = $voos[$viagem->getVoo() - 1];
        if ($voo->getCompanhiaAerea() == null) {
            $compAereaVoo = "null";
        } else {
            $compAereaVoo = $voo->getCompanhiaAerea();
        }
        print_r($viagem->getIndex() . "-" .$voo->getAeroportoOrigem() . "-" . $voo->getAeroportoDestino() . "-" . $compAereaVoo . "-" . $viagem->getHorarioPartida() . "-" . $viagem->getHorarioChegada() . "-" . $viagem->getValorviagem() . "-" . $viagem->getValorFranquia() . "\r\n");
    }
}

function ver_Viagem(){
    $viagens = Viagem::getRecords();

    if (count($viagens) == 0) {
        print_r("Nenhuma viagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostra_Viagem($viagens);

    print_r("\n\n");
}

function altera_Viagem(){
    $viagens = Viagem::getRecords();

    if (count($viagens) == 0) {
        print_r("Nenhuma viagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostra_Viagem($viagens);

    $index = (int)readline("Digite o index do voo: ");

    $viagem = $viagens[$index - 1];

    $voos = Voo::getRecords();
    mostraVoos($voos);
    $index = (int)readline("Digite o index do voo: ");

    $voo = $voos[$index - 1];

    $horarioPartida = $voo->getPrevisaoPartida();
    $horarioChegada = $voo->getPrevisaoChegada();

    $carga = (float)readline("digite o valor da carga: ");
    $milhasViagem = (int)readline("digite o valor das milhas: ");
    $valorViagem = (float)readline("digite o valor da viagem: ");
    $valorFranquiaBagagem = (float)readline("digite o valor da franquia:");

    $codigoViagem = (string)readline("digite um codigo para a viagem: ");

    $viagemnova = new Viagem($horarioPartida,$horarioChegada,$carga,$index,$milhasViagem,$valorViagem,$valorFranquiaBagagem,$codigoViagem);

    $viagem->alterarViagem($viagemnova);
    $viagem->save();

}

function mostrar_passageiros_Viagem(){
    $viagens = Viagem::getRecords();

    if (count($viagens) == 0) {
        print_r("Nenhuma viagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostra_Viagem($viagens);

    $index = (int)readline("Digite o index do voo: ");

    $viagem = $viagens[$index - 1];
    $passageirosViagem = $Viagem->getPassageiros();
    mostra_Passageiros($passageirosViagem);

}

function adicionar_passageiros_Viagem(){
    $viagens = Viagem::getRecords();

    if (count($viagens) == 0) {
        print_r("Nenhuma viagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostra_Viagem($viagens);

    $index = (int)readline("Digite o index do voo: ");

    $viagem = $viagens[$index - 1];

    $passagens = Passagem::getRecords();

    if (count($passagens) == 0) {
        print_r("Nenhuma passagem cadastrada!\r\n");
        print_r("\n\n");
        return;
    }

    mostrar_Passagens($passagens);

    $index = (int)readline("Digite o index da Passagem: ");

    $passagem = $passagens[$index - 1];

    if($passagem->getViagem() ==   $viagem->getcodigoViagme()){

        $viagem->inserirPassgeiro($passagem);

    }

}