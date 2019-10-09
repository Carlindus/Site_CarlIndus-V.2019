<?php
// Path configuration
$RELATIVE_PATH = 'cid';
$ASSETS_PATH = $RELATIVE_PATH . '/assets';
$PHP_PATH = $RELATIVE_PATH . '/phpPart';
$DOCUMENTS_PATH = '';
$DOWNLOAD_PATH = $RELATIVE_PATH . '/downloads';

// Content of the site
$content_url = "$RELATIVE_PATH/config/config_content.json";
$CONTENT = json_decode(file_get_contents($content_url), true);

// Meta config of the site
$lang = "fr";
$site_title = "CarlIndus Design";
$site_description = "description de la page";

// Recaptcha configuration
$RECAPTCHA_KEY = "XLdeDKcUAAAAAPR_wsJA4i_lmzMpJnkjgEKzbN44"; // Fake value
$RECAPTCHA_SECRET = "XLdeDKcUAAAAAPkPqW54gIJHj2aMcJ_3d8iSr6wi"; // Fake value
