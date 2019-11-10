<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.11.2019
 * Time: 11:49
 */

namespace app\Services\ErrorHandlingService;


class ErrorHandlingService
{
    public function errorHandlingMessage()
    {
        echo "This command doesn't exist. Please use command 'help' to see available command list";
        echo PHP_EOL;
    }
}