<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.11.2019
 * Time: 10:53
 */

namespace app\Services\ReportService;
use app\Model\ParseDataSourceInterface\ParseDataSourceInterface;
use app\Model\ParseDataToCSV\ParseDataToCSV;
use app\Model\DataOperations\DataOperations;


class ReportService
{
    private  $actionParseData;


    public function setTypeReport(ParseDataSourceInterface $actionParseData)
    {
        $this->actionParseData = $actionParseData;
    }

    public function openReport($domain)
     {
         $this->actionParseData->setDomain($domain);
         $this->actionParseData->load();
         echo PHP_EOL;
     }
}