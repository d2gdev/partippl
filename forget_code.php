<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mn = new Main_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_email = $_POST["u_email"];

        Functions::data_validation($u_email, "u_email", "email", "20", "21");

        if (Functions::$ok_alert == "ok") {
            $mn->check_email($u_email);
        }else {
            header("Location: forget.php");
        }



        if (Session::show_value("check_mail") == "ok") {
            require 'PHPMailer/Exception.php';
            require 'PHPMailer/PHPMailer.php';
            require 'PHPMailer/SMTP.php';

            $mail = new PHPMailer;

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
            $mail->addAddress($u_email);

            // Set email format to HTML
            $mail->isHTML(true);

            // Mail subject
            $mail->Subject = 'Reset Password';
            $rand_id = rand();
            // Mail body content
            $bodyContent = '<h1>Security Code</h1>';
            $bodyContent .= '<p>Your security code is<h1>'.$rand_id.'</h1></p>';
            $mail->Body    = $bodyContent;

            // Send email
            if(!$mail->send()) {
                Session::set_value("mail_message", "Email won't Send");
            }else {
                Session::set_value("mail_message", "<b>Info!</b> Please check your email.");
            }

            Session::set_value("u_name", $u_email);
            Session::set_value("rand_id", $rand_id);
            header("Location: new_password.php");
        }
    }
?>
