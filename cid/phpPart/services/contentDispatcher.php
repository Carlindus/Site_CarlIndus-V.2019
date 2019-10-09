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
        $this->taskbarContent = array();
        $this->desktopContent = array();
    }
    /**
     * Read the content in the config file
     * and push it into the right container (desktop and/or taskbar)
     * @param Array $content of configuration file
     */
    public function dispatch($content)
    {
        foreach ($content as $elem => $contentElem) {

            if (array_key_exists('location', $contentElem)) {
                foreach ($contentElem['location'] as $keyLoc => $elemLocation) {
                    switch ($elemLocation['component']) {
                        case "desktop":
                            $this->desktopContent[$elem] = $contentElem;
                            break;
                        case "taskbar":
                            $this->taskbarContent[$elem] = $contentElem;
                            break;
                    }
                }
            }
            $this->dispatch($contentElem['content']);
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
