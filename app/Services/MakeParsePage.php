<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.11.2019
 * Time: 10:53
 */

namespace app\Services\MakeParsePage;
use app\Model\ParseDataToCSV\ParseDataToCSV;
use app\Model\Url\Url;
use app\Model\Parse\Parse;
use app\Model\DataOperations\DataOperations;


class MakeParsePage
{
     public function makeParse()
     {
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
}