<?php
namespace app\Controller\Controller;
use app\Model\ParseDataToCSV\ParseDataToCSV;
use app\Model\Url\Url;
use app\Model\Parse\Parse;
use app\Model\DataOperations\DataOperations;
use app\Model\HelpData\HelpData;
class Controller
{
    public function parse(){
        $user_url = readline('Введите url для парсинга:');
        $url = new Url($user_url);
        $url = $url->SetUrl($user_url);
        $dom = new \DOMDocument();
        $parse = new Parse( $url, $dom );
        $page_html_text = $parse->getPageHtml();
        $parse->getPageObject($page_html_text);
        $images = $parse->getTagsFromPage('img');
        $data = new DataOperations();
        $source = new ParseDataToCSV();
        $source->setUrl($url);
        $source->setDomain($url);
        $source->setData($images);
        $data->setSourceType($source);
        $result = $data->save();

        if ($result) {
            $fullsrc = $source->getFullSrc();
            echo 'Файл записан успешно';
            echo PHP_EOL;
            echo"Путь к файлу : $fullsrc";
            echo PHP_EOL;
        }
        else{
            echo 'Ошибка записи файла';
            echo PHP_EOL;
        }
    }


    public function report(){
        $domain = readline('Введите domain для просмотра отчета:');
        $data = new DataOperations();
        $source = new ParseDataToCSV();
        $source->setDomain($domain);
        $data->setSourceType($source);
        $data->load();
        echo PHP_EOL;
    }

    public function help(){
        $helpdata = new HelpData();
        $command_array = ['parse', 'report', 'help', 'quit'];
        foreach ($command_array as $command) {
            echo $helpdata->getCommandsHelp($command);
            echo PHP_EOL;
        }
    }

    public function quit(){
        echo "Всего доброго!";
        echo PHP_EOL;
    }

    public function defaultcontroller(){
        echo "This command doesn't exist. Please use command 'help' to see available command list";
        echo PHP_EOL;
    }
}