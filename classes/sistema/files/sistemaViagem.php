<?php

include_once("../libs/global.php");
include_once("files/sistemaVoo.php")

function cadastra_Viagem(){

    $voos = Voo::getRecords();
    mostraVoos($voos)
    $index = (int)readline("Digite o index do voo: ");

    $voo = $voos[$index - 1];

    $horarioPartida = $voo->getPrevisaoPartida();
    $horarioChegada = $voo->getPrevisaoChegada();

    $carga = (float)readline("digite o valor da carga: ");
    $milhasViagem = (int)readline("digite o valor das milhas: ");
    $valorViagem = (float)readline("digite o valor da viagem: ");
    $valorFranquiaBagagem = (float)readline("digite o valor da franquia:");

    $viagem = new Viagem($horarioPartida,$horarioChegada,$carga,$index,$milhasViagem,$valorViagem,$valorFranquiaBagagem);

    $viagem->save();
}

function mostra_Viagem(array $viagens){
    print_r("Viagens cadastradas:\r\n");
    print_r("Index -  Aeroporto Origem - Aeroporto Destino - Comp Aerea - Horario Partida - Horario Chegada - Valor da Viagem - Valor da franquia\r\n");
    $voos = Voo::getRecords();
    foreach($viagens ad $viagem){
        $voo = $voos[$viagem->getVoo() - 1]
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
    mostraVoos($voos)
    $index = (int)readline("Digite o index do voo: ");

    $voo = $voos[$index - 1];

    $horarioPartida = $voo->getPrevisaoPartida();
    $horarioChegada = $voo->getPrevisaoChegada();

    $carga = (float)readline("digite o valor da carga: ");
    $milhasViagem = (int)readline("digite o valor das milhas: ");
    $valorViagem = (float)readline("digite o valor da viagem: ");
    $valorFranquiaBagagem = (float)readline("digite o valor da franquia:");

}

function mostrar_passageiros_Viagem(){

}

function adicionar_passageiros_Viagem(){

}