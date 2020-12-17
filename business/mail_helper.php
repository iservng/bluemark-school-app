<?php

    require_once 'PHPMailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require_once 'PHPMailer/vendor/phpmailer/phpmailer/src/Exception.php';
    require_once 'PHPMailer/vendor/phpmailer/phpmailer/src/SMTP.php';
    require_once 'PHPMailer/vendor/autoload.php';

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

class EmailSender
{

    public static function SendEmailWithAttachment($pdf_file, $pdf_file_name, $to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html = false)
    {
        if (!self::valid_email($to_address))
        {
            throw new Exception('This To address is invalid: ' . htmlspecialchars($to_address));
        }
        if (!self::valid_email($from_address))
        {
            throw new Exception('This From address is invalid: ' . htmlspecialchars($from_address));
        }

        // require_once 'PHPMailer/vendor/autoload.php';
        require_once('PHPMailer'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

        $mail = new PHPMailer();
        // **** You must change the following to match your
        // **** SMTP server and account information.
        $mail->isSMTP();                             // Set mailer to use SMTP
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->Host = 'smtp.gmail.com';              // Set SMTP server
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                   // Set encryption type
        $mail->Port = 587;                           // Set TCP port
        $mail->SMTPAuth = true;                      // Enable SMTP authentication
        $mail->Username = 'bangisandu@gmail.com'; // Set SMTP username
        $mail->Password = 'onyekaonwutalu';           // Set SMTP password

        //path to the file you want to attach
        $mail->addAttachment($pdf_file, $pdf_file_name);
        // $mail->addStringAttachment($pdf_file, $pdf_file_name);

        // Set From address, To address, subject, and body
        $mail->setFrom($from_address, $from_name);
        $mail->addAddress($to_address, $to_name);
        $mail->Subject = $subject;
        $mail->Body = $body;                  // Body with HTML
        $mail->AltBody = strip_tags($body);   // Body without HTML
        if ($is_body_html) {
            $mail->isHTML(true);              // Enable HTML
        }

        if(!$mail->send()) {
            throw new Exception('Error sending email: ' .
                                htmlspecialchars($mail->ErrorInfo) );
        }
    }


    public static function SendEmail($to_address, $to_name, $from_address, $from_name, $subject, $body, $is_body_html = false)
    {
        if (!self::valid_email($to_address))
        {
            throw new Exception('This To address is invalid: ' . htmlspecialchars($to_address));

        }
        if (!self::valid_email($from_address))
        {
            throw new Exception('This From address is invalid: ' . htmlspecialchars($from_address));
        }

        require_once 'PHPMailer/vendor/autoload.php';

        // require_once PHPMAILER_DIR . 'autoload.php';
        $mail = new PHPMailer();
        // **** You must change the following to match your
        // **** SMTP server and account information.
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();                             // Set mailer to use SMTP

        $mail->Host = 'smtp.gmail.com';              // Set SMTP server
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;                   // Set encryption type
        $mail->Port = 587;                           // Set TCP port
        $mail->SMTPAuth = true;                      // Enable SMTP authentication
        $mail->Username = 'bangisandu@gmail.com'; // Set SMTP username
        $mail->Password = 'onyekaonwutalu';           // Set SMTP password

        // Set From address, To address, subject, and body
        $mail->setFrom($from_address, $from_name);
        $mail->addAddress($to_address, $to_name);
        $mail->Subject = $subject;
        $mail->Body = $body;                  // Body with HTML
        $mail->AltBody = strip_tags($body);   // Body without HTML
        if ($is_body_html) {
            $mail->isHTML(true);              // Enable HTML
        }

        if(!$mail->send()) {
            // throw  new Exception('Error sending email: ' . htmlspecialchars($mail->ErrorInfo) );
            return false;
            //INSTEAD OF THROWING EXCEPTION I WILL MODIFIY IT TO USE MY APP ERROR BOX
            
        }
    }

    private static function valid_email($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        } else {
            return true;
        }
    }

}
?>
