<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $old_pass = $_POST["old_pass"];
        $new_pass = $_POST["new_pass"];

        Functions::data_validation($old_pass, "old_pass", "pass", "5", "12");
        Functions::data_validation($new_pass, "new_pass", "pass", "5", "12");

        if (Functions::$ok_alert == "ok") {
            $mn->change_password($old_pass, $new_pass);        
        }else {
            header("Location: change_password.php");
        }
    }
?>