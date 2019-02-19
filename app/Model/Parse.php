<?php
namespace app\Model\Parse;
class Parse
{
   private $url;
   private $dom;

   public function __construct($url, \DOMDocument $dom)
    {
        $this->url = $url;
        $this->dom = $dom;
    }

    public function getPageHtml(){
        $pagehtml = file_get_contents($this->url);
        return $pagehtml;
    }

    public function getPageObject($page_html_text){
            $dom = $this->dom;
            $dom->loadHTML($page_html_text);
            return $dom;
    }

    public function getTagsFromPage($tagname){
            $dom = $this->dom;
            $elements = $dom->getElementsByTagName($tagname);
        return $elements;
    }


}