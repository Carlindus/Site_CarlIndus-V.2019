<?php

class Taskbar
{

    private $content;
    private $menuItems;


    function __construct($taskbarContent)
    {
        $this->content = $taskbarContent;
        $this->menuItems = '';
    }

    /**
     * Create the DOM structure for the taskbar
     * @return String of HTML
     */
    function createTaskbar()
    {
        global $ASSETS_PATH;

        $this->addAllMenuItems();
        return ('<section id="taskbar" >
                <div id="startmenu-btn">
                    <nav id="startmenu-nav">
                        <h2><span>Website</span> CarlIndus</h2>
                    <ul>'
            . $this->getMenuItems() .
            '</ul>
                    </nav>
                    <div class="inner-border">
                        <img src="' . $ASSETS_PATH . '/img/start-logo.png">
                        <span>Start</span>
                    </div>
                </div>
                <div id="minimize-windows-area">
                </div>
                <div id="notification-area">
                    <div class="inner-border">
                        <span id="notification-time">&nbsp;</span>
                        <span id="notification-date">&nbsp;</span>

                    </div>
                </div>
            </section>');
    }

    /**
     * Generate a link
     * @param Object $link
     * @return String of HTML
     */
    function addMenuItem($link)
    {
        $menuItem = new MenuItem($link->name, $link->url, $link->img);
        return $menuItem->createMenuItem();
    }

    /**
     * Generate list of links 
     * @return String of HTML
     */
    function addAllMenuItems()
    {
        foreach ($this->content as $key => $link) {
            $this->menuItems .= '<li>' . $this->addMenuItem($link) . '</li>';
        }
    }

    /**
     * Get the value of menuItems
     * @return  mixed
     */
    public function getMenuItems()
    {
        return $this->menuItems;
    }
}
