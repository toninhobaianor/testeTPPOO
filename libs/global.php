<?php
function autoloader($pClassName)
{
    echo __NAMESPACE__;
    $path = '';

    $teste_path = __DIR__;

    // print_r($teste_path);

    if (str_contains($teste_path, "joao")) {
        // print_r("Achou joao");
        $path = '/home/joao/ufmg/poo/tp-poo/';
    } else {
        // print_r("Não achou joao");
        $path = '/home/runner/tp-poo/';
    }

    if ($pClassName == 'persist') {


        $path = $path . 'libs/' . $pClassName . '.php';

        // CAMINHO REPLIT
        // $path = '/home/runner/tp-poo/libs/' . $pClassName . '.php';

        // CAMINHO JOAO
        // $path = '/home/joao/ufmg/poo/tp-poo/libs/' . $pClassName . '.php';
    } else {


        $path = $path . 'classes/' . 'class' . $pClassName . '.php';

        // CAMINHO REPLIT
        // $path = '/home/runner/tp-poo/' . 'class' . $pClassName . '.php';

        // CAMINHO JOAO
        // $path = '/home/joao/ufmg/poo/tp-poo/' . 'class' . $pClassName . '.php';
    }

    // print_r('Caminho: ' . $path . '\n');

    if (is_file($path)) {
        include_once $path;
    } else {
        $path = __DIR__ . '/classes/class.' . $pClassName . '.php';
        if (is_file($path)) {
            include_once $path;
        } else
            throw (new Exception('Não foi encontrada a definição da classe ' . $pClassName . ' na pasta classes.'));
    }
}
spl_autoload_register('autoloader');
