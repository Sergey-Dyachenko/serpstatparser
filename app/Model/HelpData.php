<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 19.02.2019
 * Time: 22:01
 */

namespace app\Model\HelpData;


class HelpData
{

    public function getCommandsHelp($command)
    {
        switch ($command){
            case 'parse':
                $help_message = "Команда 'parse' - производит парсинга ccылок картинок.";
                break;
            case 'report':
                $help_message =  "Команда 'report' - выводит в консоль результаты анализа для домена";
                break;
            case 'help':
                $help_message = "Команда 'help' - выводит в консоль информацию по доступным командам";
                break;
            case 'quit':
                $help_message =  "Команда 'quit' - выполняет выход из приложения";
                break;
        }
        return $help_message;
    }

}