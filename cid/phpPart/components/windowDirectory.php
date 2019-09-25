<?php


class WindowDirectory {

    
    private $isDirectory;
    private $id;
    private $name;
    private $img;
    private $content;

    function __construct($iconParent){
        $this->id = $iconParent->id;
        $this->name = $iconParent->name;
        $this->img = $iconParent->img;
        $this->content = $iconParent->content;
        $this->isDirectory = $iconParent->isDirectory;
    }
    
    function createWindowDirectory(){
        global $RELATIVE_PATH;

        $windowDir = "";
        if ($this->isDirectory){
            $windowContent = $this->addIconsInWindow($this->content);
            $w = new Window($this->id, $this->name, $this->img, $windowContent);
            $windowDir = $w->createWindow();
        }
        
        // Check and create the directories into the content
        $windowDir .= $this->iterateInWindowContent($this->content);
        return $windowDir;
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
	 * Get the value of isDirectory
	 * @return  mixed
	 */
	public function getIsDirectory(){
		return $this->isDirectory;
	}

	/**
	 * Get the value of id
	 * @return  mixed
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * Get the value of name
	 * @return  mixed
	 */
	public function getName(){
		return $this->name;
	}

	/**
	 * Get the value of content
	 * @return  mixed
	 */
	public function getContent(){
		return $this->content;
	}

	/**
	 * Get the value of img
	 * @return  mixed
	 */
	public function getImg(){
		return $this->img;
	}
}
?>