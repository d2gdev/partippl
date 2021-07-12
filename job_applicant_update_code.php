<?php
    include_once 'lib/Update_Query.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $u_que = new Update_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $apply_status = $_POST['apply_status'];
        $apply_id = $_POST['apply_id'];
        $mailer_name = $_POST['mailer_name'];

        $u_que->update_job_applicant_status($apply_status, $apply_id);

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
        $mail->addAddress($mailer_name);

        // Set email format to HTML
        $mail->isHTML(true);

        // Mail subject
        $mail->Subject = 'Job Satus Alert';
        $rand_id = rand();
        // Mail body content
        $bodyContent = '<h1>Your Job Application Status Update</h1>';
        $bodyContent .= '<p>Your job application status has been updated.</p>';
        $mail->Body    = $bodyContent;

        if(!$mail->send()) {
            Session::set_value("mail_message", "Email won't Sent");
        }else {
            Session::set_value("mail_message", "<b>Info!</b> Pleae check your email.");
        }
    }
?>
