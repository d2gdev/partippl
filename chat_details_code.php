<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';
    $i_que = new Insert_Query();

    if (isset($_POST['inbox'])) {
        $received_by = $_POST['received_by'];
        $chat_message = $_POST['chat_message'];

        Functions::data_validation($chat_message, 'chat_message', 'text', '1', '500');
        if (Functions::$ok_alert == "ok") {
            $i_que->insert_chat_message($chat_message, $received_by);
        }else {
            header("Location: chat_details.php?chat_id=".$received_by);
        }
    }

    if (isset($_POST['outbox'])) {
        $received_by = $_POST['received_by'];
        $chat_message = $_POST['chat_message'];

        Functions::data_validation($chat_message, 'chat_message', 'text', '1', '500');
        
        if (Functions::$ok_alert == "ok") {
            $i_que->insert_chat_message_from_outbox($chat_message, $received_by);
        }else {
            header("Location: chat_details2.php?chat_id=".$received_by);
        }
    }

?>