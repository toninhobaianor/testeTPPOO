<?php

include_once("../libs/global.php");
include_once("sistema/file/sistemaCliente.php")

$sair = 0;


while ($sair == 0) {
    $escolha = 0;
    print_r("------ BEM VINDO AO SITE DAS COMPAHIAS AEREAS ------\r\n");


    print_r("---CLIENTE--- \r\n");
    print_r(++$escolha . " - Cadastra Cliente\r\n");
    print_r(++$escolha . " - Ver Clientes\r\n");
    print_r(++$escolha . " - Editar Cliente\r\n");

    $opcao = (string)readline("Digite uma opcao: ");

    $escolha = 0;

    switch($opcao){

        case ++$escolha:
            print_r("Cadastramento de Clientes\r\n");
            print_r("\n\n");
            cadastra_Cliente();
            break;
            
        case ++$escolha:
            print_r("Ver Clientes\r\n");
            print_r("\n\n");
            ver_Clientes();
            break;

        case ++$escolha:
            print_r("Editar Aeroporto\r\n");
            print_r("\n\n");
            editar_Cliente();
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

/*
function criar_passageiro(Cliente $cliente){
  $tipo= False;
  $nome = $cliente->getNome();
  $sobrenome = $cliente->getSobrenome();
  $rg = (string)readline("qual o seu rg:");
  $passaporte = (string)readline("qual o seu passaporte:");
  $documentoIden = (string)readline("agora outro documento:");
  $cpf = (string)readline("qual o seu cpf:");
  $nacio = (string)readline("qual a sua nacionalidade:");
  $data = (string)readline("qual a sua nacionalidade");
  $email = $cliente->getEmail();

  $passageiro = new Passageiro($tipo,$nome,$sobrenome,$rg,$passaporte,$documentodeIden,$cpf,$nacio,$data,$email);
  return $passageiro;
}
function validalogin(string $email){
    $clientes = Cliente::getRecords();
    foreach($clientes as $client){
        if($client->getEmail() == $email){
            $valido++;
        }
    }
  return 0;
}

function fazer_cadastro(){
    $nome = (string)readline("Digite seu nome: ");
    $sobrenome = (string)readline("Agora seu sobrenome: ");
    
    $documento = (string)readline("Agora queremos um documento de identificacao: ");
    $email = (string)readline("e agora o seu email: ");
    $cliente = new Cliente($nome,$sobrenome,$documento,$email);

  
    $cliente -> save();
    return $cliente;
}

function procurar_viajem(string $local,string $local1,int $dia,int $mes){
    $viajens = Viagem::getRecords();
    foreach($viajens as $viaje){
        if($viaje->getAeroportoOrigem() == $local && $viaje->getAeroportodestino() == $local1 && $viaje->getdia() == $dia && $viaje->getmes() == $mes){
            print_r("$viaje->getIndex() . " - " . $viaje->getAeroOrigem() . " - " . $viaje->getAerodestino() . " - " . $viaje->getdia() . " - " . $viaje->getHorario()."-".$viaje->getCompanhiaaerea(). " - ".$viaje->getValorViagem()\r\n");
            $temviaje++;
        }
    }
}

function escolher_assento(int $index){
    $viajens = Viagem::getRecords();
    foreach($viajens as $viaje){
        if($viaje->getindex() == $index){
            $aeronave = $viaje->getAeronave();
            print_r($aeronave->getAssentos());
        }
    }

}

function comprar_passagem(int $index,string $assento){
    $viajens = Viagem::getRecords();
    foreach($viajens as $viaje){
        if($viaje->getindex() == $index){
          
         // $passagem = new Passagem($viaje->getValorViagem(),$assento);
        }
    }
}
*/