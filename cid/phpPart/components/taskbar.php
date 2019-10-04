<?php

class Taskbar
{

    private $content;
    private $menuItems;

    //TODO gestion et test du $taskbarContent

    function __construct($taskbarContent)
    {
        $this->content = $taskbarContent;
        $this->menuItems = '';
    }

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

    function addMenuItem($name, $targetURL, $img)
    {
        $menuItem = new MenuItem($name, $targetURL, $img);
        return $menuItem->createMenuItem();
    }

    function addAllMenuItems()
    {
        foreach ($this->content as $key => $value) {
            $this->menuItems .= '<li>' . $this->addMenuItem($value->name, $value->url, $value->img) . '</li>';
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
