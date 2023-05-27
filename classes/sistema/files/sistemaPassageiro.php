<?php

include_once("../libs/global.php");

function cadastra_Passageiro(){
    $tipoPassageiro = (bool)readline("Digite se e true ou false: ");
    $nome = (string)readline("Digite um nome: ");
    $sobrenome = (string)readline("Digite um sobrenome: ");
    $documentoIdentificacao = (string)readline("Digite um documento: ");
    $cpf = (string)readline("Digite seu cpf: ");
    $nacionalidade = (string)readline("Digite uma nacionalidade: ");
    $dataDeNascimento = (string)readline("Digite uma data de nascimento: ");
    $email = (string)readline("Digite um email: ");

    $passageiro = new Passageiro($tipoPassageiro,$nome,$sobrenome,$documentoIdentificacao,$cpf,$nacionalidade,$dataDeNascimento,$email);

    $passageiro->save();
}

function mostra_Passageiros(array $passageiros){
    print_r("Passageiros cadastrados:\r\n");
    print_r("Index - nome - sobrenome - Rg - Passaporte - cpf - nacionalidade - email \r\n");

    foreach($passageiros as $passageiro){
        if($passageiro->getRg() == null){
            $rg = "null";
        }
        else{
            $rg = $passageiro->getRg();
        }

        if($passageiro->getPassaporte() == null){
            $pass = "null";
        }
        else{
            $pass = $passageiro->getPassaporte();
        }

        print_r($passageiro->getIndex() . "-" . $passageiro->getNome() . "-" . $passageiro->getSobrenome() . "-" . $rg . "-" . $pass . "-" . $passageiro->getCpf() . "-" . $passageiro->getNacionalidade() . "-" . $passageiro->getEmail() . "\r\n");
    }
}

function ver_Passageiros(){
    $passageiros = Passageiro::getRecords();

    if (count($passageiros) == 0) {
        print_r("Nenhum passageiro cadastrado!\r\n");
        print_r("\n\n");
        return;
    } else {

        mostra_Passageiros($passageiros);

        print_r("\n\n");
    }

}

function editar_passageiro(){
    $passageiros = Passageiro::getRecords();

    if (count($passageiros) == 0) {
        print_r("Nenhum passageiro cadastrado!\r\n");
        print_r("\n\n");
        return;
    } 

    mostra_Passageiros($passageiros);
    $index = (int)readline("digite o index de um passgeiro");

    $passageiro = $passageiros[$index - 1];


    $tipoPassageiro = (bool)readline("Digite se e true ou false: ");
    $nome = (string)readline("Digite um nome: ");
    $sobrenome = (string)readline("Digite um sobrenome: ");
    $documentoIdentificacao = (string)readline("Digite um documento: ");
    $cpf = (string)readline("Digite seu cpf: ");
    $nacionalidade = (string)readline("Digite uma nacionalidade: ");
    $dataDeNascimento = (string)readline("Digite uma data de nascimento: ");
    $email = (string)readline("Digite um email: ");

    $passageironovo = new Passageiro($tipoPassageiro,$nome,$sobrenome,$documentoIdentificacao,$cpf,$nacionalidade,$dataDeNascimento,$email);

    $passageiro->alterarPassageiro($passageironovo);

    $passageiro->save();
}