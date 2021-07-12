<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mn = new Main_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_email = $_POST["u_email"];
        $u_pass = $_POST["u_pass"];

        Functions::data_validation($u_email, "u_email", "email","20", "21");
        Functions::data_validation($u_pass, "u_pass", "pass", "5", "12");

        if (Functions::$ok_alert == "ok") {
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
            $mail->Subject = 'PartiPpl Account Verification!';

            $rand_id = rand();
            // Mail body content
            $bodyContent = '<h1>PartiPpl Activation Code</h1>';
            $bodyContent .= '<p>Your activation code is <h1>'.$rand_id.'</h1></p>';
            $mail->Body    = $bodyContent;

            // Send email
            if(!$mail->send()) {
                Session::set_value("mail_message", "The email failed to send.");
            }else {
                Session::set_value("mail_message", "Please check your email for your activation code.");
            }

            Session::set_value("rand_id", $rand_id);

            Session::set_value('s_email', $u_email);
            Session::set_value('s_pass', $u_pass);

            header("Location: verify.php");
        }else {
            header("Location: sign.php");
        }
    }
?>
