<?php

class MenuItem{
    
    private $name;
    private $targetURL;
    private $img;

    function __construct($name, $targetURL, $img){
        $this->name = $name;
        $this->targetURL = $targetURL;
        $this->img = $img;
    }

    function createMenuItem(){
        global $ASSETS_PATH;

        return (
            '<a class="menuItem btn" href="'.$this->targetURL.'">
                <img   src="'.$ASSETS_PATH.'/img/siteIcons/'.$this->getImg().'"/>
                <p>'.$this->name.'</p>
            </a>'
        );
    }


	/**
	 * Get the value of name
	 * @return  mixed
	 */
	public function getName(){
		return $this->name;
	}

	/**
	 * Set the value of name
	 * @param   mixed  $name  
	 * @return  self
	 */
	public function setName($name){
		$this->name = $name;
		return $this;
	}

	/**
	 * Get the value of targetURL
	 * @return  mixed
	 */
	public function getTargetURL(){
		return $this->targetURL;
	}

	/**
	 * Set the value of targetURL
	 * @param   mixed  $targetURL  
	 * @return  self
	 */
	public function setTargetURL($targetURL){
		$this->targetURL = $targetURL;
		return $this;
	}

	/**
	 * Get the value of img
	 * @return  mixed
	 */
	public function getImg(){
		return $this->img;
	}

	/**
	 * Set the value of img
	 * @param   mixed  $img  
	 * @return  self
	 */
	public function setImg($img){
		$this->img = $img;
		return $this;
	}
}
