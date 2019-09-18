<?php

$RELATIVE_PATH = 'cid';
$ASSETS_PATH = $RELATIVE_PATH;
$PHP_PATH = $RELATIVE_PATH.'/phpPart';
$DOCUMENTS_PATH = '';


$content_url = "$RELATIVE_PATH/config/config_content.json";
$CONTENT = json_decode(file_get_contents($content_url));


$site_title="CarlIndus Design";
$site_description="description de la page";

?>