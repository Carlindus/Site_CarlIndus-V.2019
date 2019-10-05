<?php


class WindowDirectory
{


    private $type;
    private $id;
    private $name;
    private $img;
    private $content;

    function __construct($iconParent)
    {
        $this->id = $iconParent->id;
        $this->name = $iconParent->name;
        $this->img = $iconParent->img;
        $this->content = $iconParent->content;
        $this->type = $iconParent->type;
    }

    /**
     * Create the DOM structure of a window directory
     * @return String of HTML
     */
    function createWindowDirectory()
    {

        $windowDir = "";
        if ($this->type == "directory") {
            $windowContent = $this->addIconsInWindow($this->content);
            $w = new Window($this->id, $this->name, $this->img, $windowContent);
            $windowDir = $w->createWindow();
        }

        // Check and create the directories into the content
        $windowDir .= $this->iterateInWindowContent($this->content);
        return $windowDir;
    }

    /**
     * Create all icons content in the window directory
     * @param Object all icons content in the directory
     * @return String of HTML
     */
    private function addIconsInWindow($content)
    {
        $iconsInContent = '';
        foreach ($content as $key => $value) {
            $icon = new Icon($value);
            $iconsInContent .= $icon->createIcon();
        }
        return $iconsInContent;
    }

    /**
     * Iterate on objects content in directory to find other directories
     * @param Object content of directory icon
     * @return String of HTML
     */
    private function iterateInWindowContent($windowLinked)
    {
        $windowContentLinked = '';
        foreach ($windowLinked as $key => $value) {
            if ($value->type == "directory") {
                $newWindow = new WindowDirectory($value);
                $windowContentLinked .= $newWindow->createWindowDirectory();
            }
        }
        return $windowContentLinked;
    }


    /**
     * Get the value of type
     * @return  mixed
     */
    public function getType()
    {
        return $this->type;
    }


    /**
     * Get the value of id
     * @return  mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     * @return  mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of content
     * @return  mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the value of img
     * @return  mixed
     */
    public function getImg()
    {
        return $this->img;
    }
}
