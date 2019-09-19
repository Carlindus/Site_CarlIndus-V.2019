<?php 

class Window {
    

    private $id;
    private $title;
    private $content;

    function __construct($id, $title, $DOMContent){
        $this->id = $id;
        $this->title = $title;
        $this->content = $DOMContent;
    }

    function createWindow(){
        return (
            '<article   id="'.$this->getId().'"
						class="directory"
						data-position="unset">
                <div class="top-bar">
                    <div class="cross">
                        <span class="cross-1"></span>
                        <span class="cross-2"></span>
                    </div>
                    <p> '.$this->getTitle().' </p>
                </div>
                <div class="iconsContainer">
                '.$this->getContent().'
                </div>
            </article>'
        );
    }

	/**
	 * Get the value of title
	 * @return  mixed
	 */
	public function getTitle(){
		return $this->title;
	}

	/**
	 * Set the value of title
	 * @param   mixed  $title  
	 * @return  self
	 */
	public function setTitle($title){
		$this->title = $title;
		return $this;
	}

	/**
	 * Get the value of content
	 * @return  mixed
	 */
	public function getContent(){
		return $this->content;
	}

	/**
	 * Set the value of content
	 * @param   mixed  $content  
	 * @return  self
	 */
	public function setContent($content){
		$this->content = $content;
		return $this;
	}

	/**
	 * Get the value of id
	 * @return  mixed
	 */
	public function getId(){
		return $this->id;
	}

	/**
	 * Set the value of id
	 * @param   mixed  $id  
	 * @return  self
	 */
	public function setId($id){
		$this->id = $id;
		return $this;
	}
}



?>