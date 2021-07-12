<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_text = $_POST["u_text"];
        $u_pass = $_POST["u_pass"];

        Functions::data_validation($u_text, "u_text", "number");
        Functions::data_validation($u_pass, "u_pass", "pass");

        if (Functions::$ok_alert == "ok") {
            $rand_id = Session::show_value("rand_id");
            if ($u_text != $rand_id) {
                Session::set_value("new_message", "<b>Error!</b> Security Code doesn't match");
                header("Location: new_password.php");
            }else {
                $mn->reset_password($u_pass);
            }        
        }else {
            header("Location: new_password.php");
        }
    }
?>