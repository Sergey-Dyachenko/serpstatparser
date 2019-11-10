<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.11.2019
 * Time: 11:35
 */

namespace app\Services\HelpService;
use app\Model\HelpData\HelpData;

class HelpService
{
        public function getHelpText()
        {
            $helpdata = new HelpData();
            $command_array = ['parse', 'report', 'help', 'quit'];
            foreach ($command_array as $command) {
                echo $helpdata->getCommandsHelp($command);
                echo PHP_EOL;
            }
        }
}