<!-- ##### Creating the DOM content  ##### -->

<?php

// autoload all components & services 
spl_autoload_register(function ($class_name) {

  $sources = array(
    __DIR__ . '/../components/' . $class_name . '.php',
    __DIR__ . '/../services/' . $class_name . '.php'
  );

  foreach ($sources as $source) {
    if (file_exists($source)) {
      require_once $source;
    }
  }
});

// get the content of the site
// from the config-content file define in config_site.php
$dispatcher = new ContentDispatcher();
$dispatcher->dispatch($CONTENT);

// Create the desktop content 
$myDesktop = new Desktop($dispatcher->getDesktopContent());
echo $myDesktop->createDesktop();

// Create taskbar
$myTaskbar = new Taskbar($dispatcher->getTaskbarContent());
echo $myTaskbar->createTaskbar();

?>