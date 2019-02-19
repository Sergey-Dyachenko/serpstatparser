<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 13.02.2019
 * Time: 23:26
 */

namespace app\Model\Url;


class Url{

    protected $url;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function setUrl($url)
    {
         $parsed = parse_url($url);
         if (empty($parsed['scheme'])){
            $url_http = $this->setHttpToUrl($url,'http://' );
             if ($this->checkUrlExist($url_http))
             {
                 return $url_http;
             }
             $url_https = $this->setHttpToUrl($url,'https://');
             if ($this->checkUrlExist($url_https))
             {
                 return $url_https;
             }

             return '404 - Url is not found';
         }
         else{
             if ($this->checkUrlExist($url))
             {
                 return $url;
             }
             else {
                 return '404 - Url is not found';
             }
         }

    }

    private function setHttpToUrl($url, $protocol)
    {
        $url = $protocol . ltrim($url, '/');
        return $url;
    }


    private function checkUrlExist($url)
    {
        $file_headers = get_headers($url);

        if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found'){
            return false;
        }
        else {
            return true;
        }
    }

}