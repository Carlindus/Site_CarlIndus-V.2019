<!-- ##### Creating the DOM content  ##### -->

<?php

// autoload Components
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


$dispatcher = new ContentDispatcher();
$dispatcher->dispatch($CONTENT);
// Create the desktop content 
$myDesktop = new Desktop($dispatcher->getDesktopContent());
$myTaskbar = new Taskbar($dispatcher->getTaskbarContent());
echo $myDesktop->createDesktop();
echo $myTaskbar->createTaskbar();

?>