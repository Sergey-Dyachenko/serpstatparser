<?php
require __DIR__."/vendor/autoload.php";
use app\Controller\Controller\Controller;
$controller = new Controller();

do {

    $command = readline('Введите команду:');
    switch ($command) {
        case 'parse':
            $controller->parse();
            break;
        case 'report':
            $controller->report();
            break;
        case 'help':
            $controller->help();
            break;
        case 'quit':
            $controller->quit();
            break;
        default :
            $controller->defaultcontroller();
    }

} while ($command != 'quit');

