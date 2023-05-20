<?php

function sis_cadastrarVoo()
{
    $frequencia = (string)readline("Digite a frequencia do voo (1 - D, 2 - S, 3 - T, 4 - Q, 5 - Q, 6 - S, 7 - S): ");

    $frequencia = explode(",", $frequencia);

    // print_r("Freq: ");
    // print_r($frequencia);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroportoOrigem = (int)readline("Digite o index do aeroporto de origem: ");
    $indexAeroportoDestino = (int)readline("Digite o index do aeroporto de destino: ");

    $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1]->getIndex();
    $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1]->getIndex();

    // print_r("Aeroporto Origem: " . $aeroportoOrigem . "\r\n");
    // print_r("Aeroporto Destino: " . $aeroportoDestino . "\r\n");

    $dataHoraPartida = (string)readline("Digite a data e hora de previsao partida (dd/mm/aaaa hh:mm): ");

    $dataHoraPartida = DateTime::createFromFormat("d/m/Y H:i", $dataHoraPartida);

    // print_r("Data Hora Partida: ");
    // print_r($dataHoraPartida->format("d/m/Y H:i"));
    // print_r("\n");

    $dataHoraChegada = (string)readline("Digite a data e hora de previsao chegada (dd/mm/aaaa hh:mm): ");

    $dataHoraChegada = DateTime::createFromFormat("d/m/Y H:i", $dataHoraChegada);

    // print_r("Data Hora Chegada: ");
    // print_r($dataHoraChegada->format("d/m/Y H:i"));
    // print_r("\n");

    $voo = new Voo($frequencia, $aeroportoOrigem, $aeroportoDestino, $dataHoraPartida, $dataHoraChegada);

    $voo->save();

    print_r("Voo cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verVoos()
{
    $voos = Voo::getRecords();

    if (count($voos) == 0) {
        print_r("Nenhum voo cadastrado!\r\n");
        print_r("\n\n");
        return;
    }

    mostraVoos($voos);

    print_r("\n\n");
}

function mostraVoos(array $voos)
{
    print_r("Voos cadastrados:\r\n");
    print_r("Index - Frequencia - Aeroporto Origem - Aeroporto Destino - Registro Aeronave - Piloto - Copiloto - Comissarios - Previsao Partida - Previsao Chegada - Previsao Duracao - Codigo Voo\r\n");

    foreach ($voos as $voo) {

        $aeronaveVoo = "";
        $pilotoVoo = "";
        $copilotoVoo = "";
        $comissariosVoo = "";
        $codigoVoo = "";

        if ($voo->getAeronave() == null) {
            $aeronaveVoo = "null";
        } else {
            $aeronaveVoo = $voo->getAeronave()->getRegistro();
        }

        if ($voo->getPiloto() == null) {
            $pilotoVoo = "null";
        } else {
            $pilotoVoo = $voo->getPiloto();
        }

        if ($voo->getCopiloto() == null) {
            $copilotoVoo = "null";
        } else {
            $copilotoVoo = $voo->getCopiloto();
        }

        if ($voo->getListaComissariosArray() == null) {
            $comissariosVoo = "null";
        } else {
            $comissariosVoo = $voo->getListaComissariosString();
        }

        if ($voo->getCodigoVoo() == null) {
            $codigoVoo = "null";
        } else {
            $codigoVoo = $voo->getCodigoVoo();
        }

        print_r($voo->getIndex() . " - " . $voo->getFrequenciaString() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $aeronaveVoo  . " - " . $pilotoVoo . " - " . $copilotoVoo . " - " . $comissariosVoo . " - " . $voo->getPrevisaoPartida()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoChegada()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoDuracao()->format("%H:%I") . " - " . $codigoVoo . "\r\n");
        // print_r($voo->getIndex() . " - " . $voo->getFrequenciaString() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $voo->getPrevisaoPartida()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoChegada()->format("d/m/Y H:i")  . " - " . $voo->getPrevisaoDuracao()->format("%H:%I:%S") . "\r\n");
    }
}

function sis_editarVoo()
{
    $voos = Voo::getRecords();

    if (count($voos) == 0) {
        print_r("Nenhum voo cadastrado!\r\n");
        print_r("\n\n");
        return;
    }

    mostraVoos($voos);

    $index = (int)readline("Digite o index do voo: ");

    $voo = $voos[$index - 1];

    $frequencia = (string)readline("Digite a frequencia do voo (1 - D, 2 - S, 3 - T, 4 - Q, 5 - Q, 6 - S, 7 - S): ");

    $frequencia = explode(",", $frequencia);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroportoOrigem = (int)readline("Digite o index do aeroporto de origem: ");

    $indexAeroportoDestino = (int)readline("Digite o index do aeroporto de destino: ");

    $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1];

    $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1];

    $indexAeroportoOrigem = $aeroportoOrigem->getIndex();
    $indexAeroportoDestino = $aeroportoDestino->getIndex();

    print_r("Aeroporto Origem: " . $indexAeroportoOrigem . "\r\n");

    print_r("Aeroporto Destino: " . $indexAeroportoDestino . "\r\n");

    $indexCompanhiasAereasAeroportoOrigem = $aeroportoOrigem->getListaCompanhiasAereas();

    // print_r("Companhias Aereas Aeroporto Origem: \r\n");
    // print_r($indexCompanhiasAereasAeroportoOrigem);

    $companhiasAereas = array();

    foreach ($indexCompanhiasAereasAeroportoOrigem as $companhiaAerea) {
        // $companhiasAereas[] = $companhiaAerea->getNome();
        $compAerea = CompanhiaAerea::getRecordsByField('index', $companhiaAerea);
        array_push($companhiasAereas, $compAerea[0]);
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    // $aeronave = $aeronaves[$indexAeronave - 1];

    $aeronave = Aeronave::getRecordsByField('index', $indexAeronave);

    $aeronave = $aeronave[0];

    $pilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    mostraPilotos($pilotos);

    $indexPiloto = (int)readline("Digite o index do piloto: ");

    // $piloto = $piloto[$indexPiloto - 1];

    $copilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    // foreach ($copilotos as &$copiloto) {
    //     if ($copiloto->getIndex() == $indexPiloto) {
    //         unset($copiloto);
    //     }
    // }

    mostraPilotos($copilotos);

    $indexCopiloto = (int)readline("Digite o index do copiloto: ");

    // $copiloto = $copiloto[$indexCopiloto - 1];

    $comissario = Comissario::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    mostraComissarios($comissario);

    $indexComissario = (int)readline("Digite o index dos comissarios: ");

    $listaIndexComissario = explode(",", $indexComissario);

    // $listaComissarios = [];

    // foreach ($listaIndexComissario as $index) {
    //     // $comissarios[] = $comissario[$index - 1];
    //     array_push($listaComissarios, $comissario[$index - 1]);
    // }

    $previsaoPartida = (string)readline("Digite a data e hora de previsao partida (dd/mm/aaaa hh:mm): ");

    $previsaoPartida = DateTime::createFromFormat("d/m/Y H:i", $previsaoPartida);

    $previsaoChegada = (string)readline("Digite a data e hora de previsao chegada (dd/mm/aaaa hh:mm): ");

    $previsaoChegada = DateTime::createFromFormat("d/m/Y H:i", $previsaoChegada);

    $codigoVoo = (string)readline("Digite o codigo do voo: ");

    // $novoVoo = Voo::criarVooCompleto($frequencia, $aeroportoOrigem, $aeroportoDestino, $aeronave, $piloto, $copiloto, $listaComissarios, $dataHoraPartida, $dataHoraChegada, $codigo);

    $novoVoo = Voo::criarVooCompleto($frequencia, $indexAeroportoOrigem, $indexAeroportoDestino, $previsaoPartida, $previsaoChegada, $indexCompanhiaAerea, $aeronave, $indexPiloto, $indexCopiloto, $listaIndexComissario, $codigoVoo);

    if ($novoVoo == null) {
        print_r("Voo não pode ser editado!!\r\n");
        return;
    } else {

        $voo->alterarVoo($novoVoo);

        $voo->save();

        print_r("Voo editado com sucesso!\r\n");
    }

    print_r("\n\n");
}
