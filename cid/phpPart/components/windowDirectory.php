<?php


class WindowDirectory {

    private $isDirectory;
    private $id;
    private $name;
    private $content;

    function __construct($iconParent){
        $this->id = $iconParent->id;
        $this->name = $iconParent->name;
        $this->content = $iconParent->content;
        $this->isDirectory = $iconParent->isDirectory;
    }
    
    function createWindowDirectory(){
        global $RELATIVE_PATH;

        $windowContainer = (!$this->isDirectory) ?
        '' :
        '<article id="'.$this->getId().'"
        class="directory window-closed"
        data-is-still-open="false">
        <div class="top-bar">
                <div class="cross">
                    <span class="cross-1"></span>
                    <span class="cross-2"></span>
                </div>
                <p> '.$this->getName().' </p>
                </div>
                <div class="iconsContainer">
                '.$this->addIconsInWindow($this->content).'
                 </div>
        </article>';

        // Check and create the directories into the content
        $windowContainer .= $this->iterateInWindowContent($this->content);
        return $windowContainer;
    } 
    
    private function addIconsInWindow($content){
        $iconsInContent = '';
        foreach ($content as $key => $value){ 
            $icon = new Icon($value);
            $iconsInContent .= $icon->createIcon();
        }
        return $iconsInContent;
    }
    
    private function iterateInWindowContent($windowLinked){
        $windowContentLinked = '';
        foreach ($windowLinked as $key => $value){
            if ($value->isDirectory){
                $newWindow = new WindowDirectory($value);
                $windowContentLinked .= $newWindow->createWindowDirectory();
            }
        }
        return $windowContentLinked;
    }


	/**
	 * Get the value of name
	 *
	 * @return  mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Get the value of content
	 *
	 * @return  mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * Get the value of id
	 *
	 * @return  mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of isDirectory
	 *
	 * @return  mixed
	 */
	public function getIsDirectory()
	{
		return $this->isDirectory;
	}
}
?>