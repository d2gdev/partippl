<?php
    include_once 'lib/Insert_Query.php';
    $i_que = new Insert_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $c_email = $_POST['c_email'];

        $i_que->collect_email_code($c_email);
    }
?>