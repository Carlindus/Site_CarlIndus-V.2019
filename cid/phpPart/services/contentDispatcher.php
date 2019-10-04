<?php

/**
 * undocumented class
 */
class ContentDispatcher
{

    private $taskbarContent;
    private $desktopContent;

    function __construct()
    {
        $this->taskbarContent = [];
        $this->desktopContent = [];
    }

    public function dispatch($content)
    {
        foreach ($content as $elem) {

            if (property_exists($elem, 'location')) {
                foreach ($elem->location as $elemLocation) {
                    switch ($elemLocation->component) {
                        case "desktop":
                            array_push($this->desktopContent, $elem);
                            break;
                        case "taskbar":
                            array_push($this->taskbarContent, $elem);
                            break;
                    }
                }
            }
            $this->dispatch($elem);
        }
    }

    /**
     * Get the value of taskbarContent
     * @return  mixed
     */
    public function getTaskbarContent()
    {
        return $this->taskbarContent;
    }

    /**
     * Set the value of taskbarContent
     * @param   mixed  $taskbarContent  
     * @return  self
     */
    private function setTaskbarContent($taskbarContent)
    {
        $this->taskbarContent = $taskbarContent;
        return $this;
    }

    /**
     * Get the value of desktopContent
     * @return  mixed
     */
    public function getDesktopContent()
    {
        return $this->desktopContent;
    }

    /**
     * Set the value of desktopContent
     * @param   mixed  $desktopContent  
     * @return  self
     */
    private function setDesktopContent($desktopContent)
    {
        $this->desktopContent = $desktopContent;
        return $this;
    }
}
