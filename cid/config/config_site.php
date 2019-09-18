<?php

// Path configuration
$RELATIVE_PATH = 'cid';
$ASSETS_PATH = $RELATIVE_PATH;
$PHP_PATH = $RELATIVE_PATH.'/phpPart';
$DOWNLOAD_PATH = $RELATIVE_PATH.'/downloads';

// Content of the site
$content_url = "$RELATIVE_PATH/config/config_content.json";
$CONTENT = json_decode(file_get_contents($content_url));

// Meta config of the site
$lang = "es"; 
$site_title="CarlIndus Design";
$site_description="description de la page";

// Recaptcha configuration
$RECAPTCHA_KEY = "6LdeDKcUAAAAAPR_wsJA4i_lmzMpJnkjgEKzbN44";
$RECAPTCHA_SECRET = "6LdeDKcUAAAAAPkPqW54gIJHj2aMcJ_3d8iSr6wi";

?>