<?php

/**
 * create the desktop display
 */
class Desktop
{
	private $content;

	function __construct($desktopContent)
	{
		$this->content = $desktopContent;
	}

	/**
	 * Create the DOM structure for the desktop
	 * @return String of HTML
	 */
	function createDesktop()
	{
		global $ASSETS_PATH;

		return ('<section id="win311">
				<div class="logowin311">
					<img src="' . $ASSETS_PATH . '/img/winCidlogo.png"
							alt="Parodie du logo windows 3.11(7)" />
				</div>'
			. $this->createDesktopIconContainer() .
			'</section>');
	}

	/**
	 * Create one container of the desktop divide on 9 containers (grid)
	 * @return String of HTML
	 */
	private function createDesktopIconContainer()
	{

		$desktopIconLocation = (object) []; // list of the icons for each zones
		$desktopIconContainers = ''; // DOM of the icons'containers
		$desktopWindows = ''; // DOM of the window directory for each icon's directory

		foreach ($this->content as $icon) {

			if (property_exists($icon, 'location')) {
				foreach ($icon->location as $iconLocation) {

					if ($iconLocation->component == "desktop") {
						$desktopIcon = new Icon($icon);
						$myLocation = $this->getDesktopPosition($icon);
						$desktopIconLocation->$myLocation .= $desktopIcon->createIcon();

						if ($icon->type == "directory") {
							$window = new WindowDirectory($icon);
							$desktopWindows .= $window->createWindowDirectory();
						}
					}
				}
			}
		}

		// create and add each desktopContainers in list to the desktop DOM
		foreach ($desktopIconLocation as $key => $value) {
			$desktopIconContainers .=
				'<div class="desktopContainer ' . $key . '">
					<div class="iconsContainer">' . $value . '</div>
				</div>';
		}

		$desktop = $desktopIconContainers . $desktopWindows;

		return $desktop;
	}

	/** 
	 * Get the position in the desktop's grid if exist, else return null.
	 * @param Object $icon 
	 * @return String or null
	 */
	public function getDesktopPosition($icon)
	{
		foreach ($icon->location as $element) {
			if ($element->component == "desktop") {
				return $element->position;
			}
		}
		return null;
	}

	/**
	 * Get the value of content
	 *
	 * @return  Object
	 */
	public function getContent()
	{
		return $this->content;
	}
}
