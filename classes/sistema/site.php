<?php

include_once("../libs/global.php");
include_once("files/sistemaCliente.php");
include_once("files/sistemaPassageiro.php");
include_once("files/sistemaViagem.php");
include_once("files/sistemaPassagem.php");

$sair = 0;


while ($sair == 0) {
    $escolha = 0;
    print_r("------ BEM VINDO AO SITE DAS COMPAHIAS AEREAS ------\r\n");


    print_r("---CLIENTE--- \r\n");
    print_r(++$escolha . " - Cadastra Cliente\r\n");
    print_r(++$escolha . " - Ver Clientes\r\n");
    print_r(++$escolha . " - Editar Cliente\r\n");

    print_r("---PASSAGEIRO--- \r\n");
    print_r(++$escolha . " - Cadastra Passgeiro\r\n");
    print_r(++$escolha . " - Ver Passageiro\r\n");
    print_r(++$escolha . " - Editar Passageiro\r\n");

    print_r("---VIAGEM--- \r\n");
    print_r(++$escolha . " - Cadastra viagem\r\n");
    print_r(++$escolha . " - Ver Viagens\r\n");
    print_r(++$escolha . " - Editar Viagem\r\n");
    print_r(++$escolha . " - ver os passageiros da viagem\r\n");
    print_r(++$escolha . " - adicionar passageiros na Viagem\r\n");

    print_r("---PASSAGEM--- \r\n");
    print_r(++$escolha . " - Cadastra Passagem\r\n");
    print_r(++$escolha . " - Ver Passagem\r\n");
    print_r(++$escolha . " - Editar Passagem\r\n");

    print_r("\r\n-1 para sair do sistema\r\n");

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
            print_r("Editar Clientes\r\n");
            print_r("\n\n");
            editar_Cliente();
            break;

        case ++$escolha:
            print_r("Cadastramento de Passageiro\r\n");
            print_r("\n\n");
            cadastra_Passageiro();
            break;
                
        case ++$escolha:
            print_r("Ver Passageiros\r\n");
            print_r("\n\n");
            ver_Passageiros();
            break;
    
        case ++$escolha:
            print_r("Editar Passgeiros\r\n");
            print_r("\n\n");
            editar_Passageiro();
            break;

        case ++$escolha:
            print_r("Cadastramento de Viagens\r\n");
            print_r("\n\n");
            cadastra_Viagem();
            break;
                    
        case ++$escolha:
            print_r("Ver Viagem\r\n");
            print_r("\n\n");
            ver_Viagem();
            break;
            //criar o get valor viagem e valor franquia
        
        case ++$escolha:
            print_r("Editar Viagem\r\n");
            print_r("\n\n");
            altera_Viagem();
            break;
            //terminar o altera viagem
      
        case ++$escolha:
            print_r("ver Passageiros na Viagem\r\n");
            print_r("\n\n");
            mostrar_passageiros_Viagem();
            break;

        case ++$escolha:
            print_r("adicionar Passageiros na  Viagem\r\n");
            print_r("\n\n");
            adicionar_passageiros_Viagem();
            break;

        case ++$escolha:
            print_r("Cadastramento de Passagem\r\n");
            print_r("\n\n");
            criar_Passagem();
            break;
                    
        case ++$escolha:
            print_r("Ver Passagens\r\n");
            print_r("\n\n");
            ver_Passagens();
            break;
        
        case ++$escolha:
            print_r("Editar Passagens\r\n");
            print_r("\n\n");
            editar_Passagem();
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