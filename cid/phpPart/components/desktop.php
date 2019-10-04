<?php

/**
 * undocumented class
 */
class Desktop
{

	private $content;

	function __construct($desktopContent)
	{
		$this->content = $desktopContent;
	}

	function createDesktop()
	{
		global $ASSETS_PATH;

		return ('<section id="win311">
				<div class="logowin311">
					<img src="' . $ASSETS_PATH . '/img/winCidlogo.png"
							alt="Parodie du logo windows 3.117" />
				</div>'
			. $this->createDesktopIconContainer() .
			'</section>');
	}

	private function createDesktopIconContainer()
	{

		$desktopIconLocation = (object) [];
		$desktopIconContainers = '';
		$desktopWindows = '';

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

		foreach ($desktopIconLocation as $key => $value) {
			$desktopIconContainers .=
				'<div class="desktopContainer ' . $key . '">
					<div class="iconsContainer">' . $value . '</div>
				</div>';
		}

		$desktop = $desktopIconContainers . $desktopWindows;

		return $desktop;
	}


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
	 * @return  mixed
	 */
	public function getContent()
	{
		return $this->content;
	}
}
