<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Functions.php';

    $mn = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $u_email = Session::show_value('s_email');
        $u_pass = Session::show_value('s_pass');

        $u_number = $_POST['u_number'];

        Functions::data_validation($u_number, 'u_number', 'number', '2', '15');

        if (Functions::$ok_alert == "ok") {
            if (Session::show_value('rand_id') == $u_number) {
                $mn->sign_up($u_email, $u_pass); 
            }else {
                Session::set_value('mail_message','Enter Correct Security Code');
                header("Location: verify.php");
            }
        }else {
            header("Location: verify.php");
        }
    }
?>