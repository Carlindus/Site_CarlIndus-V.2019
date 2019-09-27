<?php 

/**
 * undocumented class
 */
class Desktop{
	
	private $content;
	private $taskbar;

    function __construct($desktopContent){
		$this->content = $desktopContent;
		$this->taskbar = new Taskbar();
	}
	
	function createDesktop(){
		global $ASSETS_PATH;

		return $desktopDOM = (
			'<section id="win311">
				<div class="logowin311">
					<img src="'. $ASSETS_PATH .'/img/winCidlogo.png"
							alt="Parodie du logo windows 3.117" />
				</div>'
				. $this->createDesktopIconContainer() .
			'</section>'
			. $this->taskbar->createTaskBar()
		);
	}
	
	private function createDesktopIconContainer(){
		
		$desktopIconLocation = (object)[];
		$desktopIconContainers = '';
		$desktopWindows = '';

		foreach ($this->content as $icon){

			if (property_exists($icon, 'isOnDesktop')){
				$desktopIcon = new Icon($icon);
				$myLocation = $icon->location;
				$desktopIconLocation->$myLocation .= $desktopIcon->createIcon();
			  }
			  if (property_exists($icon, 'isDirectory') && $icon->isDirectory){
				  $window = new WindowDirectory($icon);
				  $desktopWindows .= $window->createWindowDirectory();
				  /*
				*/
			}
		}

		foreach ($desktopIconLocation as $key => $value) {
			$desktopIconContainers .=
			'<div class="desktopContainer '.$key.'">
				<div class="iconsContainer">'
			  		.$value.
				'</div>
			</div>';
		  }
		  $desktop = $desktopIconContainers.$desktopWindows;
		
		  return $desktop;
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
	 * Set the value of taskbar
	 * @param   mixed  $taskbar  
	 * @return  self
	 */
	public function setTaskbar($taskbar){
		$this->taskbar = $taskbar;
		return $this;
	}
}

?>