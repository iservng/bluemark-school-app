<?php
//Activate sesion
session_start();

//Start output buffer
ob_start();

//Include utility files
require_once '../include/config.php';
require_once BUSINESS_DIR . 'error_handler.php';

//Set the error handler
ErrorHandler::SetHandler();

//Load the application page template
require_once PRESENTATION_DIR . 'application.php';
require_once PRESENTATION_DIR . 'link.php';
require_once BUSINESS_DIR . 'mail_helper.php';

//Load the database handler
require_once BUSINESS_DIR . 'database_handler.php';

//Load business tier
require_once BUSINESS_DIR . 'applicants.php';
require_once BUSINESS_DIR . 'catalog.php';
require_once BUSINESS_DIR . 'shopping_cart.php';
require_once BUSINESS_DIR . 'orders.php';
require_once BUSINESS_DIR . 'symmetric_crypt.php';
require_once BUSINESS_DIR . 'secure_card.php';
require_once BUSINESS_DIR . 'customer.php';
require_once BUSINESS_DIR . 'i_pipeline_section.php';
require_once BUSINESS_DIR . 'gp.php';

// require_once PHPMAILER_DIR . 'class.phpmailer.php';
// require_once PHPMAILER_DIR . 'class.smtp.php';
// require_once PHPMAILER_DIR . 'PHPMailerAutoload.php';

//
// require_once BUSINESS_DIR . 'ps_dummy.php';

require_once BUSINESS_DIR . 'order_processor.php';
require_once BUSINESS_DIR . 'ps_initial_notification.php';
require_once BUSINESS_DIR . 'ps_check_funds.php';
require_once BUSINESS_DIR . 'ps_check_stock.php';
require_once BUSINESS_DIR . 'ps_stock_ok.php';
require_once BUSINESS_DIR . 'ps_take_payment.php';
require_once BUSINESS_DIR . 'ps_ship_goods.php';
require_once BUSINESS_DIR . 'ps_ship_ok.php';
require_once BUSINESS_DIR . 'ps_final_notification.php';
require_once BUSINESS_DIR . 'authorize_net_request.php';





//Load smarty template file
$application = new Application();

//Display the page
$application->display(SITE_ADMIN);

//Close database connection
DatabaseHandler::Close();

//Output content from the buffer//
flush();
ob_flush();
ob_end_clean();
?>