<?php

include_once("../libs/global.php");

$sair = 0;
$valido = 0;
$temviaje = 0;
while ($sair == 0) {
    print_r("------ BEM VINDO AO SITE DAS COMPAHIAS AEREAS ------\r\n");
  
    //$opcao = (string)readline("Digite seu email: ");
    //validalogin($opcao); 
    // essa função poderia retornar um cliente e ser colocada em uma variavel

    print_r("agora oque o senhor(a) '' deseja fazer \r\n");
    print_r("C - comprar passagem\r\n");
    print_r("A - alterar passagem\r\n");
    print_r("D - cancelar passagem\r\n");
    print_r("S - sair do site\r\n");
    $op = (string)readline("Digite uma opcao: ");
    if($op == "C"){
        print_r("nos conte um pouco sobre a viagem que deseja fazer\r\n");
        $local_parti = (string)readline("Digite de onde vai sai(sigla do estado): ");
        $local_cheg = (string)readline("Digite para onde vai (sigla do estado): ");
        $dia = (int)readline("Digite o dia que deseja sair: ");
        $mes = (int)readline("Digite o mes que deseja sair: ");
        print_r("Index - Aeroporto de partdida - Destino - dia - Horario - companiaaeria\r\n");
        procurar_viajem($local_parti,$local_cheg,$dia,$mes);
        if($temviaje >= 1){
            print_r("encontramos estas viajens\r\n");
            $via = (int)readline("Digite em qual delas deseja viajar: ");
            escolher_assento($via);
            $assento = (string)readline("Digite em qual assento deseja viajar: ");
            print_r("quem vai viajar(se for voce digite 1 se for outra pessoa digite 2)\r\n");
            $esc = (int)readline("Digite aqui: ");
            if($esc == 1){
              //pergunta se e cliente
              //cria o passageiro a partir do cliente
              comprar_passagem($via,$assento);
            }
            else{
              //pergunta se e cliente
              //cria um passageiro com algumas perguntas
              comprar_passagem($via,$assento);
            }
            
        }
        else{
    
        }
    }
    if($op == "A"){
        
    }
    if($op == "D"){
        //saber se e cliente
        //assesar o historico de compras
      //retirar o objeto procurado e destrui-lo
    }
    if($op == "S"){
        print_r("tenha um bom dia!!!");
        $sair++;
    }

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
    $rg = (string)readline("Qual o seu rg: ");
    $passaporte = (string)readline("Agora o seu passaporte: ");
    $email = (string)readline("e agora o seu email: ");
    $cliente = new Cliente($nome,$sobrenome,$rg,$passaporte,$email);
    
    $cliente -> save();
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
          
          $passagem = new Passagem($viaje->getValorViagem(),$assento)
        }
    }
}