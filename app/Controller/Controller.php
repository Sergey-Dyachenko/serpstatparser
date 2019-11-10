<?php
namespace app\Controller\Controller;

use app\Model\ParseDataToCSV\ParseDataToCSV;
use app\Services\ReportService\ReportService;
use app\Services\HelpService\HelpService;
use app\Services\MakeParsePage\MakeParsePage;
use app\Services\QuitService\QuitService;
use app\Services\ErrorHandlingService\ErrorHandlingService;

class Controller
{
    private $makeParsePage;
    private $reportService;
    private $printHelp;
    private $quitService;
    private $errorHandling;

    public function __construct()
    {
        $this->makeParsePage = new MakeParsePage();
        $this->reportService = new ReportService();
        $this->printHelp = new HelpService();
        $this->quitService = new QuitService();
        $this->errorHandling = new ErrorHandlingService();
    }

    public function parse(){
       $this->makeParsePage->makeParse();
    }

    public function report(){
        $domain = readline('Введите domain для просмотра отчета:');
        $this->reportService->setTypeReport(new ParseDataToCSV());
        $this->reportService->openReport($domain);
    }

    public function help(){
        $this->printHelp->getHelpText();
    }

    public function quit(){
        $this->quitService->quitText();
    }

    public function errorHandle(){
        $this->errorHandling->errorHandlingMessage();
    }
}