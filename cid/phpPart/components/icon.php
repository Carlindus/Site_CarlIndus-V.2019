<?php

class Icon {

    private $isDirectory;
    private $isOnDesktop;
    private $isForm;
    private $location;

    private $id;
    private $name;
    private $url;
    private $img;
    private $alt;
    private $title;
    
    private $content;

    function __construct( $icon ) {
        $this->isDirectory = $icon->isDirectory;
        $this->isOnDesktop = $icon->isOnDesktop;
        $this->location = $icon->location;
        $this->id = $icon->id;
        $this->name = $icon->name;
        $this->url = $icon->url;
        $this->img = $icon->img;
        $this->alt = $icon->alt;
        $this->title = $icon->title;
        $this->content = $icon->content;

        // Form
        if (property_exists($icon, 'isForm')) $this->isForm = true;
    }
 
    function createIcon(){
        $iconLink = $this->getIconLink();
        $iconImage = $this->getIconImage();
        $iconDom = 
            '<div class="icons">'
                .$iconLink
                .$iconImage
                .'<h2>'.$this->getName().'</h2>
                </a>
            </div>';
        return $iconDom;
    }
    

    private function getIconLink(){
        global $RELATIVE_PATH;
        $iconLink; 

        if ($this->isDirectory() || $this->isForm() ){
            $iconLink = '<a id="'.$this->getId().'-ico" href="#" >';
        } else {
            $iconLink = ( $this->isHttpUrl($this->getUrl()) || $this->isAnchorURL($this->getUrl()) ) ?
            '<a href="'.$this->getUrl().'">'
            :
            '<a href="'.$RELATIVE_PATH.'/'.$this->getUrl().'">';
        }
        return $iconLink;
    }
    
    private function getIconImage(){
        global $ASSETS_PATH;
        $iconImg;

        if ($this->isDirectory() && !$this->isOnDesktop()){
            $iconImg = 
            '<div class="ico">
                <div    class="ico-onglet"
                        alt="'.$this->getAlt().'" 
                        title="'.$this->getTitle().'">
                </div>
            </div>';

        } else {
            $iconImg =  
            '<img   src="'.$ASSETS_PATH.'/img/siteIcons/'.$this->getImg().'"
                    alt="'.$this->getAlt().'" 
                    title="'.$this->getTitle().'"/>';
        }
        return $iconImg;
    }
    
    function isHttpUrl($urlToCheck){
        return (strtoupper(substr($urlToCheck, 0, 4)) === "HTTP") ? true : false;
    }

    function isAnchorURL($urlToCheck){
        return (substr($urlToCheck, 0, 1) === "#") ? true : false;
    }
    
    /** GETTERS **/
    function isDirectory() {
        return $this->isDirectory;
    }
    function isOnDesktop() {
        return $this->isOnDesktop;
    }

    function isForm(){
        return $this->isForm;
    }

    function getLocation() {
        return $this->location;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getName() {
        return $this->name;
    }
    
    function getUrl() {
        return $this->url;
    }
    
    function getImg() {
        return $this->img;
    }
    
    function getAlt() {
        return $this->alt;
    }
    
    function getTitle() {
        return $this->title;
    }
    
    function getContent() {
        return $this->content;
    }
    

}


?>