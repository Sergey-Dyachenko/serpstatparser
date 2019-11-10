<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17.02.2019
 * Time: 8:56
 */

namespace app\Model\ParseDataSourceInterface;


interface ParseDataSourceInterface
{
    public function save();
    public function load();
    public function update();
    public function delete();
    public function setDomain($domain);

}