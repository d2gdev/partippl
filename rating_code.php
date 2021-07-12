<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $i_que = new Insert_Query();

    if (isset($_POST['employe'])) {
        $j_id = $_POST['j_id'];
        $r_to = $_POST['r_to'];

        $rating_text = $_POST['rating_text'];
        $rating = $_POST['rating'];

        Functions::data_validation($rating_text, 'rating_text', 'text', '5', '200');
        Functions::data_validation($rating, 'rating', 'select', '1', '2');

        if (Functions::$ok_alert == "ok") {
            $i_que->insert_rating($j_id,$r_to,$rating_text,$rating);

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
            $mail->addAddress($r_to);

            // Set email format to HTML
            $mail->isHTML(true);

            // Mail subject
            $mail->Subject = 'Job Rating Alert';
            $rand_id = rand();
            // Mail body content
            $bodyContent = '<h1>You Have Been Rated!</h1>';
            $bodyContent .= '<p>An employer has given you a rating based on a booking you completed.
                              Once both members have given a review both reviews will become public.</p>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()) {
                Session::set_value("mail_message", "Email won't Sent");
            }else {
                Session::set_value("mail_message", "<b>Info!</b> PartiPpl has sent you an email.");
            }

        }else {
            header("Location: rating.php?rating_id=".$j_id."&&received_by=".$r_to);
        }
    }

    if (isset($_POST['job_seeker'])) {
        $j_id = $_POST['j_id'];
        $r_to = $_POST['r_to'];

        $rating_text = $_POST['rating_text'];
        $rating = $_POST['rating'];

        Functions::data_validation($rating_text, 'rating_text', 'text', '5', '200');
        Functions::data_validation($rating, 'rating', 'select', '1', '2');

        if (Functions::$ok_alert == "ok") {
            $i_que->insert_rating2($j_id,$r_to,$rating_text,$rating);
        }else {
            header("Location: rating.php?rating_id=".$j_id."&&received_by=".$r_to);
        }
    }


?>
