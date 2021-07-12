<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $u_email = $_POST["u_email"];
        $u_pass = $_POST["u_pass"];

        Functions::data_validation($u_email, "u_email", "email", "20", "21");
        Functions::data_validation($u_pass, "u_pass", "pass", "5", "12");

        if (Functions::$ok_alert == "ok") {
            $mn->login($u_email, $u_pass);        
        }else {
            header("Location: login.php");
        }
    }
?>