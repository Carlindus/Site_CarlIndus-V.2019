<?php

class Icon
{

    private $type;
    private $isForm;
    private $location;

    private $id;
    private $name;
    private $url;
    private $img;
    private $alt;
    private $title;

    private $content;

    function __construct($icon)
    {
        $this->type = $icon->type;
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

    function createIcon()
    {
        return ('<div class="icons">'
            . $this->getIconLink()
            . $this->getIconImage()
            . '<h2>' . $this->getName() . '</h2>
                </a>
            </div>');
    }


    private function getIconLink()
    {
        global $RELATIVE_PATH;
        $iconLink = '';

        if ($this->type == "directory" || $this->isForm()) {
            $iconLink = '<a id="' . $this->getId() . '-ico" href="#" >';
        } else {
            $iconLink = ($this->isHttpUrl($this->getUrl()) || $this->isAnchorURL($this->getUrl())) ?
                '<a href="' . $this->getUrl() . '">'
                : '<a href="' . $RELATIVE_PATH . '/' . $this->getUrl() . '">';
        }
        return $iconLink;
    }

    private function getIconImage()
    {
        global $ASSETS_PATH;
        $iconImg = '';

        if ($this->type == "directory" && ($this->location == [])) {
            $iconImg =
                '<div class="ico">
                <div    class="ico-onglet"
                        alt="' . $this->getAlt() . '" 
                        title="' . $this->getTitle() . '">
                </div>
            </div>';
        } else {
            $iconImg =
                '<img   src="' . $ASSETS_PATH . '/img/siteIcons/' . $this->getImg() . '"
                    alt="' . $this->getAlt() . '" 
                    title="' . $this->getTitle() . '"/>';
        }
        return $iconImg;
    }

    function isHttpUrl($urlToCheck)
    {
        return (strtoupper(substr($urlToCheck, 0, 4)) === "HTTP") ? true : false;
    }

    function isAnchorURL($urlToCheck)
    {
        return (substr($urlToCheck, 0, 1) === "#") ? true : false;
    }

    /** GETTERS **/
    public function getType()
    {
        return $this->type;
    }

    public function isForm()
    {
        return $this->isForm;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function getAlt()
    {
        return $this->alt;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getContent()
    {
        return $this->content;
    }
}
