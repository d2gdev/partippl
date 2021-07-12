<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $i_que = new Insert_Query();


    if (isset($_POST['employee'])) {
        $received_by = $_POST['received_by'];
        $chat_message = $_POST['chat_message'];

        Functions::data_validation($chat_message, 'chat_message', 'text', '1', '500');

        if (Functions::$ok_alert == "ok") {
            $i_que->insert_message($received_by, $chat_message);

            if (!class_exists('PHPMailer\PHPMailer\Exception')){
                require 'PHPMailer/Exception.php';
                require 'PHPMailer/PHPMailer.php';
                require 'PHPMailer/SMTP.php';
            }

            $mail = new PHPMailer;

            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';

            $mail->isSMTP();                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username
            $mail->Password = 'kanchonkumar';   // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                    // TCP port to connect to

            // Sender info
            $mail->setFrom('tulipkumar81@gmail.com', 'Party Admin');

            // Add a recipient
            $mail->addAddress($received_by);

            // Set email format to HTML
            $mail->isHTML(true);

            // Mail subject
            $mail->Subject = 'Message Alert';
            $rand_id = rand();
            // Mail body content
            $bodyContent = '<h1>New Message Alert</h1>';
            $bodyContent .= '<p>You have new message from Employe.View message and reply him.</p>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                Session::set_value("mail_message", "Email doesn't Sent");
            }else {
                Session::set_value("mail_message", "<b>Info!</b> We are Send an Email check your Email");
            }

        }else {
            header("Location: chat_message.php?message_id=".$received_by);
        }
    }


    if (isset($_POST['job_seeker'])) {
        $received_by = $_POST['received_by'];
        $chat_message = $_POST['chat_message'];

        Functions::data_validation($chat_message, 'chat_message', 'text', '1', '500');

        if (Functions::$ok_alert == "ok") {
            $i_que->insert_message($received_by, $chat_message);

            if (!class_exists('PHPMailer\PHPMailer\Exception')){
                require 'PHPMailer/Exception.php';
                require 'PHPMailer/PHPMailer.php';
                require 'PHPMailer/SMTP.php';
            }


            $mail = new PHPMailer;

            $mail->SMTPDebug = 2;
            $mail->Debugoutput = 'html';

            $mail->isSMTP();                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;               // Enable SMTP authentication
            $mail->Username = 'info@partippl.com';   // SMTP username
            $mail->Password = 'uhvrlohhcrtywbxz';   // SMTP password
            $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                    // TCP port to connect to

            // Sender info
            $mail->setFrom('info@partippl.com', 'PartyPpl Admin');

            // Add a recipient
            $mail->addAddress($received_by);

            // Set email format to HTML
            $mail->isHTML(true);

            // Mail subject
            $mail->Subject = 'Message Alert';
            $rand_id = rand();
            // Mail body content
            $bodyContent = '<h1>New Message Alert</h1>';
            $bodyContent .= '<p>You have new message from a Job Seeker.Login to view the message and reply.</p>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                Session::set_value("mail_message", "Email doesn't Sent");
            }else {
                Session::set_value("mail_message", "<b>Info!</b> We have sent you an email.");
            }

        }else {
            header("Location: chat_message.php?message_id=".$received_by);
        }
    }
?>
