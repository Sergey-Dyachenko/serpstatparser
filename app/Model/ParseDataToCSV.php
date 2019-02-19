<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17.02.2019
 * Time: 8:50
 */

namespace app\Model\ParseDataToCSV;


use app\Model\ParseDataSourceInterface\ParseDataSourceInterface;


class ParseDataToCSV implements ParseDataSourceInterface {
    private $data;
    private  $url;
    private $domain;

    public function __construct()
    {

    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    function getDomain($url)
    {
        $pieces = parse_url($url);
        $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
            return $regs['domain'];
        }
        return false;
    }

    private function getFileName()
    {
        $domain = $this->getDomain($this->domain);
        $arr = explode(".", $domain, 2);
        $filename = $arr[0];
        return $filename;
    }

    public function setDomain($domain)
    {
        $this->domain = $domain;
    }

    private function getFolder(){
        $cwd = getcwd();
        $folder = $cwd . '\\reports\\';
        return $folder;
    }

    public function getFullSrc()
    {
        $folder = $this->getFolder();
        $filename = $this->getFileName();
        $full_src = $folder . $filename . '.csv';

        return $full_src;
    }

    public function save()
    {
        $fp = fopen($this->getFullSrc(), 'w');
        foreach ($this->data as $img){
            $fullurl='https:' . $img->getAttribute('src');
            $val = explode("," , $fullurl);
            fputcsv($fp, $val);
        }
        return  fclose($fp);
    }

//    private function setFileName()
//    {
//       $domain = parse_url($this->url, PHP_URL_HOST);
//        if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $list)) {
//            return substr($list['domain'], 0,strpos($list['domain'], "."));
//        }
//        return false;
//
//    }

    private function getFilesList()
    {
        $folder = $this->getFolder();
        $files_list = scandir($folder);
        return $files_list;
    }

    private function getReportExist()
    {
        if (!empty($this->getFilesList()))
        {
            foreach ($this->getFilesList() as $filename)
            {
                if ($this->getFileName().'.csv' == $filename )
                {
                    return true;
                }
            }
            return false;
        }
        return false;
    }


    public function load()
    {
       if ($this->getReportExist()){
           $fulldirectory  = $this->getFolder().$this->getFileName().'.csv';
           $myfile = fopen($fulldirectory, "r") or die("Unable to open file!");
           echo fread($myfile,filesize($fulldirectory));
           return fclose($myfile);

       }

       return false;

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}