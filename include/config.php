<?php

//SITE_ROOT containes the full path to the schoolshop folder
define('SITE_ROOT', dirname(dirname(__FILE__)));

//Application directories
define('PRESENTATION_DIR', SITE_ROOT . '/presentation/');
define('BUSINESS_DIR', SITE_ROOT . '/business/');
define('PHPMAILER_DIR', SITE_ROOT . '/PHPMailer/vendor/');

//Setting needed to configure the Smarty template engine
define('SMARTY_DIR', SITE_ROOT . '/libs/smarty/');
define('TEMPLATE_DIR', PRESENTATION_DIR . 'templates');
define('COMPILE_DIR', PRESENTATION_DIR . 'templates_c');
define('CONFIG_DIR', SITE_ROOT . '/include/configs');


//These should be true while developing the site
define('IS_WARNING_FATAL', true);
define('DEBUGGING', true);


//The error types to be reported
define('ERROR_TYPES', E_ALL);

//Setting about mailing the error massage to admin
define('SEND_ERROR_MAIL', false);
define('ADMIN_ERROR_MAIL', 'Administrator@example.com');
define('SENDMAIL_FROM', 'Errors@example.com');
ini_set('sendmail_from', SENDMAIL_FROM);

//By default we dont log errors to a file
define('LOG_ERRORS', false);
define('LOG_ERRORS_FILE', 'C:/bluemark/errors_log.txt');

/*
Generic error message to be displayed instead of debug info (When DEBUGGING is false)
*/
define('SITE_GENERIC_ERROR_MESSAGE', '<h1>BlueMark Error!</h1>');




// Database connectivity setup
define('DB_PERSISTENCY', 'true');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'saturday201983');
define('DB_DATABASE', 'bluemark');
define('PDO_DSN', 'mysql:host=' . DB_SERVER . ';dbname=' . DB_DATABASE);


//Server HTTP port (can omit if thee default 80 is used)
define('SERVER_HTTP_PORT', '80');
/*Name of the virtual directory the site runs in, for example:
    '/schoolshop/' if the site runs at http://www.example.com/schoolshop/
        '/' if the site runs at http://www.example.com/
*/
define('VIRTUAL_LOCATION', '/bluemark/');



//Configure products lists display options
define('SHORT_PRODUCT_DESCRIPTION_LENGTH', 150);
define('PRODUCTS_PER_PAGE', 4);

/*Minimun word length for searches, this constant must be kept in constant with the ft_min_word_len MYSQL variable*/
define('FT_MIN_WORD_LEN', 4);


//Paypal configurations
define('PAYPAL_URL', 'https://www.paypal.com/xclick/business=youremail@example.com');
define('PAYPAL_EMAIL', 'youremail@example.com');
define('PAYPAL_CURRENCY_CODE', 'USD');
define('PAYPAL_RETURN_URL', 'https://www.example.com');
define('PAYPAL_CANCEL_RETURN_URL', 'https://www.example.com');


//We enable and enforce SSL when this is set to anything else than 'no'
define('USE_SSL', 'no');


//Administration login information
define('ADMIN_USERNAME', 'schoolshop');
define('ADMIN_PASSWORD', 'schoolshop');


//shoppin cart item type
define('GET_CART_PRODUCTS', 1);
define('GET_CART_SAVED_PRODUCTS', 2);


//Cart Actions
define('ADD_PRODUCT', 1);
define('REMOVE_PRODUCT', 2);
define('UPDATE_PRODUCTS_QUANTITIES', 3);
define('SAVE_PRODUCT_FOR_LATER', 4);
define('MOVE_PRODUCT_TO_CART', 5);


//Random value used for hashing
define('HASH_PREFIX', 'K1-');


//Constant definition for order handling related message
define('ADMIN_EMAIL', 'bangisandu@gmail.com');
define('CUSTOMER_SERVICE_EMAIL', 'CustomerService@email.com');
define('ORDER_PROCESSOR_EMAIL', 'OrderProcessor@example.com');
define('SUPPLIER_EMAIL', 'Supplier@example.com');



//Store name
define('STORE_NAME', 'BlueMark');

//School Details 
define('SCHOOL_FULL_NAME', 'BlueMark Academy Katsina');
define('SCHOOL_NAME', 'BlueMark Academy');
define('SCHOOL_ADDRESS', 'No.22 Kangiwa road, adjacent Gwajogwajo house G.R.A, Katsina');
define('SCHOOL_PHONE', 'Tel: 08134899043, 09081389092. Email: bangisandu@gmail.com');
define('HEAD_OF_ADMIN', 'Jamilu Muhammed');


//Constant definition for datacash
define('DATACASH_URL', 'https://testserver.datacash.com/Transaction');
define('DATACASH_CLIENT', 'your account client number');
define('DATACASH_PASSWORD', 'your account password');



//Constants definition for  authorize.net
define('AUTHORIZE_NET_URL' , 'https://test.authorize.net/gateway/transact.dll');
define('AUTHORIZE_NET_LOGIN_ID', '57qhY8fupXR8');
define('AUTHORIZE_NET_TRANSACTION_KEY', '76GUs47pc9R85gNV');
define('AUTHORIZE_NET_TEST_REQUEST', 'FALSE');



define('FAIL_MARK', 39);
define('MAX_NUMBER_OF_STUDENT_IN_A_CLASS', 40);


/**
 * pages to load during and after maitenance
 */
define('STORE_ADMIN', 'store_admin.tpl');
define('SITE_ADMIN', 'site_admin.tpl');
define('STORE_FRONT', 'store_front.tpl');
// define('STORE_FRONT', 'men_at_work.tpl');


 ?>
