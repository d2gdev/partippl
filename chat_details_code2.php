<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';
    $i_que = new Insert_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sent_by = $_POST['sent_by'];
        $chat_message = $_POST['chat_message'];

        Functions::data_validation($chat_message, 'chat_message', 'text', '1', '500');
        
        if (Functions::$ok_alert == "ok") {
            $i_que->insert_chat_message_2($sent_by, $chat_message);
        }else {
            header("Location: chat_details2.php?chat_id=".$sent_by);
        }
    }

?>