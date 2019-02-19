<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 16.02.2019
 * Time: 21:24
 */

namespace app\Model\DataOperations;


use app\Model\ParseDataSourceInterface\ParseDataSourceInterface;

class DataOperations
{
    private $data;
    private $url;
    private $source;

    public function __construct()
    {


    }

    public function setSourceType(ParseDataSourceInterface $source)
    {
        $this->source = $source;

    }


    public function save()
    {
      return  $this->source->save();
    }

    public function load()
    {
        return $this->source->load();
    }

    public function update()
    {

    }

    public function delete()
    {

    }

}