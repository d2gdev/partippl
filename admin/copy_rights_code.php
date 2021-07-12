<?php
    include_once 'lib/Main_Query.php';
    $mn = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text_name = $_POST['text_name'];

        $mn->update_copy_right($text_name);
    }
?>