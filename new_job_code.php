<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Select_Query.php';

    error_reporting(0);

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $i_que = new Insert_Query();
    $s_que = new Select_Query();

    $data = $s_que->select_email();
    $data2 = $s_que->select_email_2();

    if ($_SESSION["collect_email"] == "") {
        if ($data != false) {
            foreach($data as $result){
                $_SESSION["collect_email"][] = $result["c_email"];
            }
        }
    }

    if ($_SESSION["collect_email_2"] == "") {
        if ($data2 != false) {
            foreach($data2 as $result){
                $_SESSION["collect_email_2"][] = $result["j_from"];
            }
        }
    }

    $arr1 = $_SESSION["collect_email"];
    $arr2 = $_SESSION["collect_email_2"];

    $total_email = array_merge($arr1, $arr2);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $j_title = $_POST['j_title'];
        $j_location = $_POST['j_location'];
        $j_type = $_POST['j_type'];
        $j_date = $_POST['j_date'];
        $j_hour = $_POST['j_hour'];
        $j_miute = $_POST['j_minute'];
        $j_am = $_POST['j_am'];
        $j_payment = $_POST['j_payment'];
        $j_work_hour = $_POST['j_work_hour'];
        $j_descripton = $_POST['j_description'];

        Functions::data_validation($j_title, 'j_title', 'text', '5', '35');
        Functions::data_validation($j_location, 'j_location', 'select', '5', '35');
        Functions::data_validation($j_type, 'j_type', 'select', '2', '35');
        Functions::data_validation($j_date, 'j_date', 'date', '2', '35');
        Functions::data_validation($j_hour, 'j_hour', 'select', '2', '35');
        Functions::data_validation($j_miute, 'j_minute', 'select', '2', '35');
        Functions::data_validation($j_am, 'j_am', 'select', '2', '35');
        Functions::data_validation($j_payment, 'j_payment', 'number', '3', '4');
        Functions::data_validation($j_work_hour, 'j_work_hour', 'number', '1', '2');
        Functions::data_validation($j_descripton, 'j_description', 'text', '200', '500');


        if (Functions::$ok_alert == "ok") {

            for ($i=0; $i < count($total_email); $i++) {
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
                $mail->addAddress($total_email[$i]);

                // Set email format to HTML
                $mail->isHTML(true);

                // Mail subject
                $mail->Subject = 'Job Alert';
                $rand_id = rand();
                // Mail body content
                $bodyContent = '<h1>New Job Post</h1>';
                $bodyContent .= '<p>Check out this awesome new job for you at PartiPpl.</p>'; 
                $mail->Body    = $bodyContent;

                if(!$mail->send()) {
                    Session::set_value("mail_message", "Email won't Sent");
                }else {
                    Session::set_value("mail_message", "<b>Info!</b> We Sent you an Email.");
                }
            }

            $i_que->post_job($j_title, $j_location, $j_type, $j_date, $j_hour, $j_miute, $j_am, $j_payment, $j_work_hour, $j_descripton);

        }else {
            header("Location: new_job.php");
        }

    }
?>
