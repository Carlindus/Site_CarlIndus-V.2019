<?php

class Taskbar {

    private $menuItems = [];
 
    function createTaskbar(){
        global $ASSETS_PATH;

        return (
            '<section id="taskbar" >
                <div id="startmenu-btn">
                    <nav id="startmenu-nav">
                    <ul>
                    '.$this->addAllMenuItems().'
                    </ul>
                    </nav>
                    <div class="inner-border">
                        <img src="'.$ASSETS_PATH.'/img/start-logo.png">
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
            </section>'
        );
    }

    function addMenuItem($name, $targetURL, $img){
        $menuItem = new MenuItem($name, $targetURL, $img);
        return $menuItem->createMenuItem();
    }

    function addAllMenuItems(){
        $menuItems = '<li>
                    '.$this->addMenuItem("Back to ... 2019", "https://www.carlindusdesign.fr/cid-react", "favicon-CID.png").'
                    </li>';
        return $menuItems;

    }
}
?>