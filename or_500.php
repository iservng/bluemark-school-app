<?php

//Set the 500 statuc code 
header('HTTP/1.0 500 Internal Server Error');
require_once 'include/config.php';
require_once PRESENTATION_DIR . 'link.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Schoolshop Application Error (500): Demo Product Catalog from BlueMark </title>
    <link href="<?php echo Link::Build('styles/tshirtshop.css'); ?>" type="text/css" rel="stylesheet">
</head>
<body>
<div id="doc" class="yui-t7">
      <div id="bd">
        <div id="header" class="yui-g">
          <a href="<?php echo Link::Build(''); ?>">
            <img src="<?php echo Link::Build('images/tshirtshop.png'); ?>"
             alt="tshirtshop logo" />
          </a>
        </div>
        <div id="contents" class="yui-g">
          <h1>
            TShirtShop is experiencing technical difficulties.
          </h1>
          <p>
            Please
            <a href="<?php echo Link::Build(''); ?>">visit us</a> soon,
            or <a href="<?php echo ADMIN_ERROR_MAIL; ?>">contact us</a>.
          </p>
          <p>Thank you!</p>
          <p>The TShirtShop team.</p>
        </div>
      </div>
    </div>
    
</body>
</html>