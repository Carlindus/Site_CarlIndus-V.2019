<?php 

class Window {
    

    private $id;
    private $title;
    private $img;
    private $content;

    function __construct($id, $title, $img, $DOMContent){
        $this->id = $id;
        $this->title = $title;
        $this->img = $img;
        $this->content = $DOMContent;
    }

    function createWindow(){
		global $ASSETS_PATH;

        return (
            '<article   id="'.$this->getId().'"
						class="directory"
						data-position="unset">
				<div class="top-bar">
					<div class="top-bar-title">
					<img src="'.$ASSETS_PATH.'/img/siteIcons/'.$this->getImg().'" />
					<p> '.$this->getTitle().' </p>
					</div>
                    <div class="cross">
                        <span class="cross-1"></span>
                        <span class="cross-2"></span>
                    </div>
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
	 * Get the value of content
	 * @return  mixed
	 */
	public function getContent(){
		return $this->content;
	}


	/**
	 * Get the value of id
	 * @return  mixed
	 */
	public function getId(){
		return $this->id;
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